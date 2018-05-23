<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    
    protected $hidden = array('created_at', 'updated_at', 'pivot');

}
