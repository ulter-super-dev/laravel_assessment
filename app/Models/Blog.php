<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, "author_id");
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, "category_id");
    }
}
