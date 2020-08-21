<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{

    protected $primaryKey = 'book_id';
    protected $fillable = [
        'book_image',
        'book_name',
        'type',
        'url',
        'description'

    ];
}
