<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    const CREATED_AT = 'createdAt';

    protected $fillable = [
        'description',
        'type',
        'price',
        'category',
        'user_id',
        'createdAt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
