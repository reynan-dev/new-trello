<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Card extends Model
{

    protected $fillable = ['title', 'user_id', 'lists_id', 'content', 'cover_image'];

    public $timestamps = false;
    use HasFactory;

    public function list(): BelongsTo {
        return $this->belongsTo(Lists::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}


