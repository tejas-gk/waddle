<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'community_name',
        'community_description',
        'summary',
        'community_image',
        'community_banner',
        'admin_id',
        'created_at',
        'updated_at'
    
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User','admin_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post','community_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment','community_id');
    }
    
}
