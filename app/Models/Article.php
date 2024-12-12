<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];


    public function author()
    {
        return $this->belongsTo(Author::class,'author_id');
    }

    public function scopeAdmin( $query){
        return $query->where('author_id', 1);
    }
}
