<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MusicListItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'music_id',
        'music_lists_id',
    ];

    public function music(): BelongsTo
    {
        return $this->belongsTo(Music::class);
    }

    public function musicList(): BelongsTo
    {
        return $this->belongsTo(MusicList::class);
    }
}
