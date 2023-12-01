<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MusicList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'search',
        'music_id',
        'music_lists_id',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function musicListItems(): HasMany
    {
        return $this->hasMany(MusicListItem::class,'music_lists_id');
    }
}
