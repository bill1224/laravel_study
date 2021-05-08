<?php

namespace App\Models;

use App\Models\User;
use App\Models\Forum;
use App\Models\Additional_comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'forum_id', 'body'];

    public function Forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Additional_comments()
    {
        return $this->hasMany(Additional_comment::class);
    }
}
