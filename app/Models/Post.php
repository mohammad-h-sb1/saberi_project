<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory , Sluggable;

    protected $fillable=[
        'user_id',
        'category_id',
        'name',
        'slug',
        'photo',
        'content',
        'updated_at',
        'status'
    ];

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function getPhotoUrl()
    {
        return asset('images/photo/'.$this->photo);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function status()
    {
        return !! $this->status ? 'فعال':'غیرفعال';
    }


}
