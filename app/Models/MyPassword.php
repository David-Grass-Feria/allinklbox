<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyPassword extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'user_name',
        'password',
        'notes',
        'parameters',
        'team_id',

    ];

    protected $casts = [
        'password' => 'encrypted'
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
