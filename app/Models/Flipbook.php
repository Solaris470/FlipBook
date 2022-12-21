<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flipbook extends Model
{
    protected $table = 'flipbook';
    protected $fillable = [
        'id',
        'name',
        'des',
        'content',
        'status',
    ];
}