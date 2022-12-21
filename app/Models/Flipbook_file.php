<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flipbook_file extends Model
{
    protected $table = 'flipbook_file';
    protected $fillable = [
        'ID',
        'FlipBookID',
        'Name',
    ];
}
