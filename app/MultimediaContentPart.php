<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ContentPart;

class MultimediaContentPart extends Model
{

    protected $hidden = array('created_at', 'updated_at', 'content_part_id');

    public function contentPart()
    {

    	return $this->belongsTo('App\ContentPart');

    }

    public static function create(ContentPart $contentPart, Request $request)
    {
    	$multimediaContentPart = new MultimediaContentPart;

    	//contentpart, title, description, filename
    	$multimediaContentPart->contentPart()->associate($contentPart);
    	$multimediaContentPart->title = $request->input('title');
    	$multimediaContentPart->description = $request->input('description');
    	$multimediaContentPart->filename = $path;
    	$multimediaContentPart->save();

    	return $multimediaContentPart;
    }
    
}
