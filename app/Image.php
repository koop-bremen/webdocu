<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $hidden = array('created_at', 'updated_at');

    public function multimediaContentPart()
    {

    	return this->belongsTo('App\MultimediaContentPart');

    }
}
