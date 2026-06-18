<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Fields that can be mass-assigned (e.g. from a form request).
     */
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    /**
     * The user who wrote this article.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
