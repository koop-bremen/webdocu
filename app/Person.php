<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    protected $hidden = array('created_at', 'updated_at', 'pivot');

    protected $table = 'persons';

    protected $fillable = ['name'];
}
