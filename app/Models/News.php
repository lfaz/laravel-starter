<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $fillable = ['title', 'slug', 'content', 'image', 'published'];

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'news';
}
