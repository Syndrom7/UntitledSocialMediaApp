<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, Likeable;
    use SoftDeletes;

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function comments() {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
