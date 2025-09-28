<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    /** @use HasFactory<\Database\Factories\AttributeFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'icon',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function values()
    {
        return $this->belongsToMany(Value::class, 'value_attribute')
            ->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attribute_value')
            ->withPivot('value_id', 'custom_value')
            ->withTimestamps();
    }

    public function scopeLatestUpdated($query)
    {
        return $query->orderBy('updated_at', 'desc');
    }
}
