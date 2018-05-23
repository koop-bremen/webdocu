<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $table = 'audios';

    protected $hidden = array('created_at', 'updated_at', 'multimedia_content_part_id');

    public function multimediaContentPart()
    {

    	return $this->belongsTo('App\MultimediaContentPart');

    }

}
