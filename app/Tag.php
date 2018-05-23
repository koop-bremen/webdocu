<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    protected $hidden = array('created_at', 'updated_at', 'pivot');

}
