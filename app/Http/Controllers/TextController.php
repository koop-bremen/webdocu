<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Text::with('ContentPart.Authors',
    						'ContentPart.Persons',
    						'ContentPart.Place',
    						'ContentPart.Tags')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	$request->validate([

	        'file' => 'required',
	        'filename' => 'required',
	        'authors' => 'required',
	        'contentCreationDate' => 'required',
	        'copyrightNotice' => 'required',
	        'description' => 'required',
	        'persons' => 'required',
	        'place' => 'required',
	        'tags' => 'required',
	        'title' => 'required'

	    ]);

    	$contentPart = ContentPart::create($request, 'audio');

    	$multimediaContentPart = MultimediaContentPart::create($contentPart, $request);

    	$audio = new Audio;
    	//multimedia_content_part
    	$audio->multimediaContentPart()->associate($multimediaContentPart);
    	$audio->save();

    	return $audio;
	
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request )
    {
        //middleware
        //@TODO

        //validation

	}
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        //middleware

        Audio::destroy( $id );

        return $id;
    }
}
