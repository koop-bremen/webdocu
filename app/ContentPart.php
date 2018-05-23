<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Author;
use App\Person;
use App\Place;
use App\Tag;

use Carbon\Carbon;

use App\Tools\VueFileUploadHandler;

class ContentPart extends Model
{

    protected $hidden = array('created_at', 'updated_at', 'place_id');
    
    public function authors()
    {
    
    	return $this->belongsToMany('App\Author', 'content_part_author');
    
    }

    public function tags()
    {
    
    	return $this->belongsToMany('App\Tag');
    
    }

    public function persons()
    {

    	return $this->belongsToMany('App\Person');

    }

    public function place()
    {
    	return $this->belongsTo('App\Place');
    }

    public static function create(Request $request, string $type)
    {
        $path = VueFileUploadHandler::saveFile($request->input('file'),
                            $request->input('filename'),
                            $type);

        $contentPart = new ContentPart;

        //place, creationDate, copyrightNotice
        $contentPart->place()->associate(Place::find($request->input('place')));
        $contentPart->content_creation_date = new Carbon($request->input('creationDate'));
        $contentPart->copyright_notice = $request->input('copyrightNotice');
        $contentPart->save();

        //authors
        $contentPart->authors()->saveMany(Author::findMany($request->input('authors')));
        //persons
        $contentPart->persons()->saveMany(Person::findMany($request->input('persons')));
        //tags
        $contentPart->tags()->saveMany(Tag::findMany($request->input('tags')));

    }
}
