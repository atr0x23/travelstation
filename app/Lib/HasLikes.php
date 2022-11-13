<?php

namespace App\Lib;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Models\Like;

trait HasLikes
{
    public function likes(): MorphMany{
        return $this->morphMany(Like::class, 'likeable')->where('is_like', true);
    }    
    
    public function dislikes(): MorphMany{
        return $this->morphMany(Like::class, 'likeable')->where('is_like', false);
    } 
}