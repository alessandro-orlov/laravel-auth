<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'user_id',
      'title',
      'img_path',
      'content',
    ];

    protected function user() {
      return $this->belongsTo('App\User');
    }
}
