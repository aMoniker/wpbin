<?php

namespace App\Console\Commands;

use App\Tag;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ScrapeTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape linked Tags from the WP DebHub';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $urls = [
            'https://developer.wordpress.org/reference/functions/',
            'https://developer.wordpress.org/reference/classes/',
            'https://developer.wordpress.org/reference/hooks/',
        ];

        $this->info( 'Starting scrape of the following resources:' );

        $table_rows = [];
        foreach ( $urls as $url ) {
            $table_rows[] = [ $url ];
        }
        $this->table( [ 'Site URL' ], $table_rows );

        $scraped_tags = [];

        foreach ( $urls as $url ) {
            try {
                $scraped_tags = array_merge(
                    $scraped_tags,
                    $this->scrape_wp_page(
                        $url,
                        '/<article.+?<h1><a href="(.+?)">(.+?)<\/a>.+?class="description">(.+?)<\/div>/si'
                    )
                );
            } catch ( \Exception $e ) {
                $this->alert( 'Web-requests are failing: ' . $e->getMessage() );
                return false;
            }
        }

        $this->info( 'Sites scraped, writing database entries...' );

        $this->output->progressStart( count( $scraped_tags ) );

        foreach ($scraped_tags as $name => $details) {
            try {
                $tag = new Tag();

                $tag->name = $name;
                $tag->url = $details['url'];
                $tag->description = $details['description'];

                $tag->save();

                $this->output->progressAdvance();
            } catch (QueryException $e) {
                $message = sprintf(
                    'Could not make a database entry for the tag `%s`: %s',
                    $name,
                    $e->getMessage()
                );

                $this->warn($message);

                Log::info($message);
            }
        }

        $this->output->progressFinish();

        $this->info( 'Finished scraping' );
    }

    private function scrape_wp_page( $url_to_scrape, $match_regex )
    {
        $scraped_tags = array();

        if ( '/' !== substr( $url_to_scrape, -1, 1 ) )
        {
            $url_to_scrape .= '/';
        }

        $url_to_scrape .= 'page/';

        $page_num = 0;

        // We are scraping paginated content, so loop over pages one at a time.
        while ( true ) {
            $page_num++;
            try {
                $client   = new Client();
                $response = $client->request(
                    'GET',
                    $url_to_scrape . $page_num,
                    [
                        'verify' => false, // Skip SSL Verify, root certificate differences can be a nightmare and no secret information is transmitted here.
                    ]
                );

                $this->info( 'Checking ' . $url_to_scrape . $page_num . ' (' . count( $scraped_tags ) . ' tags found so far) ...' );


                preg_match_all( $match_regex, $response->getBody(), $matches );

                if ( $matches && isset( $matches[1] ) && is_array( $matches[1] ) ) {
                    foreach ( $matches[1] as $num => $url ) {
                        $url         = trim( $url );
                        $function    = trim( str_replace( [ '(', ')' ], '', $matches[2][ $num ] ) );
                        $description = trim( $matches[3][ $num ] );

                        $scraped_tags[ $function ] = [
                            'url'         => $url,
                            'description' => $description,
                        ];
                    }
                }

            } catch ( GuzzleException $e ) {
                if ( 404 === $e->getCode() ) {
                    // A 404 status code means we hit a non-existing page and can stop paginating this resource.
                    $this->info( 'Page number ' . $page_num . ' does not exist, ending processing for this resource.' );

                    return $scraped_tags;
                }

                throw new \Exception( $e->getMessage() );
            }
        }

        return $scraped_tags;
    }
}
