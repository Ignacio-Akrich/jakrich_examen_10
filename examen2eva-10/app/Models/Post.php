<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'create-date',
        'publi-date',
        'options',
        'extract',
        'content',
        'access',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $visible = [
        'title',
        'create-date',
        'publi-date',
        'options',
        'extract',
        'content',
        'access',
        'user_id',
    ];
}
