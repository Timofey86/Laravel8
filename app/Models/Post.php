<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //protected $table = "Rots"; can change table_name
    protected $fillable = [ 'title', 'description', 'preview', 'thumbnail' ];

    public function getComments()
    {
        $this->hasMany(Comment::class)->orderBy('created_at');
    }
}
