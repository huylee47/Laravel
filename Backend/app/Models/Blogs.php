<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogs extends Model
{
    protected $table = 'blogs';
    use SoftDeletes;
     protected $fillable = [
        'blog_id',
        'title',
        'content',
        'author'
        
     ];
}
