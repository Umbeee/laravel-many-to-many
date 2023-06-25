<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;

    public static function titleToSlug($title)
    {
        return Str::slug($title, '-');
    }

    protected $fillable = ['title', 'content', 'slug', 'cover_image', 'category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
