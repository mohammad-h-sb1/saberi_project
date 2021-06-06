<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
