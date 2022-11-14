<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class LikeDislike extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'like',
        'dislike',
        'hasliked',
        'hasdisliked'
    ];

            //set the relationship
            public function posts(){

                return $this->hasMany(Post::class);
            }
}
