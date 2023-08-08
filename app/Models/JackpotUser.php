<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JackpotUser extends Model
{
    use HasFactory;

    public $incrementing = false;
	protected $keyType = 'uuid';

    protected $fillable = [
        'user_id', 'jackpot_id', 'image', 'is_admin', 'likes'
    ];

    public function user (): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function jackpot(): BelongsTo {
        return $this->belongsTo(Jackpot::class);
    }
}
