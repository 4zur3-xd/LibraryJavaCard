<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookBorrows extends Model
{

    protected $fillable = [
        'user_id',
        'book_id',
        'duration',
        'created_at',
    ];

    public $timestamps = false;

}
