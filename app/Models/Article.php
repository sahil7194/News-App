<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use App\Events\ArticleCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class
    ];

    protected $casts = [
        'status' => ArticleStatus::class
    ];


    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function scopeAdmin(Builder $query)
    {
        $query->where('author_id', 1);
    }

    public function scopePublished(Builder $query)
    {
        $query->where('status', 1);
    }

    public function scopeAuthor(Builder $query)
    {
        $query->where('author_id', auth()->user->id);
    }
}
