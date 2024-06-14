<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d', //change your format
        'updated_at' => 'datetime:Y-m-d',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
