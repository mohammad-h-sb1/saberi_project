<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded=[];

//    protected $with=['approvedReplies'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class);
    }
    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }
//    public function getStatusInFarsi()
//    {
//        return !! $this->is_approved ? 'تایید شده':'تایید نشده';
//    }

//    public function approvedReplies()
//    {
//        return $this->replies()->where('is_approved',true);
//    }
}
