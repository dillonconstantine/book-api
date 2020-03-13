<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'uuid';

    protected $fillable = ['uuid', 'title', 'author', 'released'];
}
