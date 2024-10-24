<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['name','email','subject','message','blog_id'];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
