<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
//class Post implements Likeable
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

        //set the relationship with users
        public function user(){

            return $this->belongsTo(User::class);
        }

        //set the relationship with like/dislike
        public function likes(){
            return $this->hasMany('App\Models\LikeDislike', 'post_id')->sum('like');
        }
        public function dislikes(){
            return $this->hasMany('App\Models\LikeDislike', 'post_id')->sum('dislike');
        }
}
