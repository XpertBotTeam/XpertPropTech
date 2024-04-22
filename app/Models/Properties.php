<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'address',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'type',
        'status',
        

    ];

    public static function typeOptions()
    {
        return ['house', 'apartment', 'office', 'villa', 'commercial'];
    }

    public static function getStatusOptions()
    {
        return ['available', 'sold'];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
}

