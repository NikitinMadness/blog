<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;


    public function tags(){
        return $this->BelongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likedUsers(){
        return $this->BelongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}