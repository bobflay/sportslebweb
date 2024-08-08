<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostPhoto extends Model
{
    use HasFactory;

    public function getPathAttribute($path)
    {
        if (request()->is('api/*')) {
            return 'https://threesixty.xpertbotacademy.online/storage/'.$path;
        }

        // For non-API requests, return the normal value
        return $path;
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
