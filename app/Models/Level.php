<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['Name','Images'];
    protected $table = 'Levels';
    public $timestamps = true;

}