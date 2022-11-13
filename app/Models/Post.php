<?php

namespace App\Models;

use App\Models\User;
use App\Lib\HasLikes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
//class Post implements Likeable
{
    use HasFactory, HasLikes;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

        //set the relationship with users
        public function user(){

            return $this->belongsTo(User::class);
        }
}
