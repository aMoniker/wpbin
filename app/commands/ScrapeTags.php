<?php

use Httpful\Request;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use WPBin\Web\Repository\Tag;
use Illuminate\Database\QueryException;

class ScrapeTags extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'scrape:tags';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Scrape linked Tags from the WP Codex';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Tag $repo)
	{
		$this->repo = $repo;
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$scraped_tags = array_merge(
			$this->scrape_wp_page(
				'http://codex.wordpress.org/Function_Reference/',
				'/href="\/Function_Reference\/([a-z0-9_]+)"/i'
			),
			$this->scrape_wp_page(
				'http://codex.wordpress.org/Class_Reference/',
				'/href="\/Class_Reference\/([a-z0-9_]+)"/i'
			),
			$this->scrape_wp_page(
				'http://codex.wordpress.org/Plugin_API/Action_Reference',
				'/href="\/Plugin_API\/Action_Reference\/([a-z0-9_]+)"/i'
			),
			$this->scrape_wp_page(
				'http://codex.wordpress.org/Plugin_API/Filter_Reference',
				'/href="\/Plugin_API\/Filter_Reference\/([a-z0-9_]+)"/i'
			)
		);

		foreach ($scraped_tags as $name => $url) {
			try {
				$this->repo->create($name, $url);
			} catch (QueryException $e) {
				// TODO: Log this in a separate file?
			}
		}

		// TODO: handle missing tags etc (maybe in a separate Command)
	}

	private function scrape_wp_page($url_to_scrape, $match_regex, $link_prefix = null)
	{
		$scraped_tags = array();
		$link_prefix = $link_prefix ?: $url_to_scrape;

		$response = Request::get($url_to_scrape)->send();

		if ($response->code === 200) {
			preg_match_all($match_regex, $response->body, $matches);

			if ($matches && isset($matches[1]) && is_array($matches[1])) {
				foreach ($matches[1] as $func_tag) {
					$url = "$link_prefix$func_tag";
					$scraped_tags[$func_tag] = $url;
				}
			}
		}

		return $scraped_tags;
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
