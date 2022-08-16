<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Post extends Model {
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'text', 'nickname'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
