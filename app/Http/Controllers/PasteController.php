<?php

namespace App\Http\Controllers;

use App\Paste;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PasteController extends Controller
{
    public function create( Request $request )
    {
        $errors = [];

        $paste = new Paste();

        $paste->title = $request->input( 'paste-title' );
        $paste->content = $request->input( 'paste' );

        $unique_hash = '';
        $hash_exists = true;

        // Make sure we are not re-using a hash.
        while ( $hash_exists ) {
            $unique_hash = Str::random();

            $check_hash = Paste::where( 'hash', $unique_hash )->first();

            if ( ! $check_hash ) {
                $hash_exists = false;
            }
        }

        $paste->hash = $unique_hash;

        $paste->save();

        return Redirect::route( 'hash', [ 'hash' => $paste->hash ] );
    }

    public function show( $hash )
    {
        $paste = Paste::where( 'hash', $hash )->firstOrFail();

        $tags = Tag::all();

        $paste_tags = [];

        foreach ( $tags as $tag ) {
            $regex = "/([^a-z0-9_])" . $tag->name . "([^a-z0-9_])/i";

            if ( ! preg_match( $regex, $paste->content ) ) {
                continue;
            }

            $paste->content = preg_replace(
                $regex,
                "\$1[" . $tag->name . "](" . $tag->url . ")\$2",
                $paste->content
            );

            $paste_tags[] = $tag;
        }

        return view( 'paste', [ 'paste' => $paste, 'tags' => $paste_tags ] );
    }
}
