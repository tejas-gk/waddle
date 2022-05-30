<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    

    protected $fillable = ['post','image','user_id','postable_type','postable_id'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function postable() {
        return $this->morphTo();
    }
    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }
    public function getUpvoteAttribute()
    {
        return $this->hasMany('App\Models\Vote')->where('upvote',1)->count();
    }
    public function getDownvoteAttribute()
    {
        return $this->hasMany('App\Models\Vote')->where('downvote',1)->count();
    }
}
