<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Music extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'team_id',
    ];


    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
