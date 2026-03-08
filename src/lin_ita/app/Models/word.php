<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class word extends Model
{
    protected $table = 'words';

    protected $fillable = [
        'italian',
        'japanese',
        'gender',
        'meaning',
    ];
}
