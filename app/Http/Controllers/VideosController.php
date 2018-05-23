<?php

namespace App\Http\Controllers;

use App\Video;

use Illuminate\Http\Request;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Video::with('MultimediaContentPart.ContentPart.Authors',
    						'MultimediaContentPart.ContentPart.Persons',
    						'MultimediaContentPart.ContentPart.Place',
    						'MultimediaContentPart.ContentPart.Tags')->get();
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

    	$contentPart = ContentPart::create($request, 'video');

    	$multimediaContentPart = MultimediaContentPart::create($contentPart, $request);

    	$video = new Video;
    	//multimedia_content_part
    	$video->multimediaContentPart()->associate($multimediaContentPart);
    	$video->save();

    	return $video;
	
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

        Video::destroy( $id );

        return $id;
    }
}
