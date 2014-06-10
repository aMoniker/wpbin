<?php

use WPBin\Core\Entity\PasteRepository;
use WPBin\Core\Entity\TagRepository;

class PasteController extends BaseController
{

    protected $repo;

    public function __construct(PasteRepository $repo, TagRepository $tagrepo)
    {
        $this->repo = $repo;
        $this->tagrepo = $tagrepo; // this is temporary, should be moved to the proper place
    }

    public function create()
    {
        // validate inputs
        $rules = [
            'paste' =>  ['required'],
        ];

        $error_messages = array(
            'paste.required' => 'Fill in the Bin, yo!',
        );

        $validator = Validator::make(Input::all(), $rules, $error_messages);

        if ($validator->fails()) {
            return Redirect::route('home')->withErrors($validator);
        }

        // make the paste
        $paste = $this->repo->create(
            Input::get('paste-title'),
            Input::get('paste')
        );

        // redirect to the hash url
        return Redirect::route('hash', array('hash' => $paste->get('hash')));
    }

    public function show($hash)
    {
        $hash = strtolower($hash);

        $paste = $this->repo->getByHash($hash);

        if (!$paste) {
            throw new NotFoundHttpException;
        }

        // TODO: this should go somewhere else

        $paste_tags = [];
        $tag_entities = $this->tagrepo->getAll();
        $paste_content = $paste->get('content');

        foreach ($tag_entities as $tag) {
            $name = $tag->get('name');
            $regex = "/([^a-z0-9_])$name([^a-z0-9_])/i";
            if (!preg_match($regex, $paste_content)) { continue; }

            $url = $tag->get('url');
            $paste_content = preg_replace(
                $regex, "\$1[$name]({$url})\$2", $paste_content
            );

            $paste_tags[] = $tag;
        }

        $paste->set('content', $paste_content);

        return View::make('paste', [
            'paste' => $paste,
            'tags'  => $paste_tags,
        ]);
    }

}