<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lists extends Model
{
    protected $table = 'lists';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}