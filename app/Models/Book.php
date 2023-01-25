<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use BeyondCode\Comments\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory,HasComments;
    protected $fillable=['tilte','author','image','full_decs','short_decs'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // public function like(User $user)
    // {
    //     return $this->likes()->create(['user_id' => $user->id, 'is_like' => true]);
    // }

    // public function dislike(User $user)
    // {
    //     return $this->likes()->create(['user_id' => $user->id, 'is_like' => false]);
    // }

    public function likesCount()
    {
        return $this->likes()->where('is_like', true)->count();
    }

    public function dislikesCount()
    {
        return $this->likes()->where('is_like', false)->count();
    }

    public function like(User $user)
    {
        $existingLike = $this->likes()->where('user_id', $user->id)->first();
        if ($existingLike) {
            if($existingLike->is_like){
                $existingLike->delete();
                return $existingLike;
            }
            $existingLike->update(['is_like' => true]);
            return $existingLike;
        }
        return $this->likes()->create(['user_id' => $user->id, 'is_like' => true]);
    }

    public function dislike(User $user)
    {
        $existingLike = $this->likes()->where('user_id', $user->id)->first();
        if ($existingLike) {
            if(!$existingLike->is_like){
                $existingLike->delete();
                return $existingLike;
            }
            $existingLike->update(['is_like' => false]);
            return $existingLike;
        }
        return $this->likes()->create(['user_id' => $user->id, 'is_like' => false]);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['is_favorite']);
    }

    public function markAsFavorite(User $user)
    {
        $this->users()->attach($user->id, ['is_favorite' => true]);
    }

    public function unmarkAsFavorite(User $user)
    {
        $this->users()->updateExistingPivot($user->id, ['is_favorite' => false]);
    }

}
