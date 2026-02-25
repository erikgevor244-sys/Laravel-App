<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = ['title', 'description', 'price', 'user_id'];
    public function user() { return $this->belongsTo(User::class); }
}