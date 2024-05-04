<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'parent_id'
    ];

    //polymporphic relationship
    public function commentable()
    {
        return $this->morphTo();
    }
    //relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relationship with replies
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

}
