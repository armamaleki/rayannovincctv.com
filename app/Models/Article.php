<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory ,SoftDeletes;
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = [
        'name',
        'slug',
        'status',
        'meta_title',
        'meta_description',
        'description',
        'short_description',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeLatestUpdated($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }
}
