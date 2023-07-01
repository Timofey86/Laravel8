<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'user_id', 'post_id'];

    public function getPost()
    {
        $this->belongsTo(Post::class);
    }

    public function getUser()
    {
        $this->belongsTo(User::class);
    }
}