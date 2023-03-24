<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class online_exam extends Model
{
   // protected $guarded=['integration'];
    public $fillable= ['integration','user_id','meeting_id','topic','start_at','duration','password','start_url','join_url'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
