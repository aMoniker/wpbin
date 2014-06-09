<?php

use WPBin\Core\Entity\PasteRepository;

class PasteController extends BaseController
{

    protected $repo;

    public function __construct(PasteRepository $repo)
    {
        $this->repo = $repo;
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

        return View::make('paste', ['paste' => $paste]);
    }

}