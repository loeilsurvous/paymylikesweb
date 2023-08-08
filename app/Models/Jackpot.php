<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jackpot extends Model
{
    public $incrementing = false;
	protected $keyType = 'uuid';
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'description', 'maxparticipant','status',
    'starts_at', 'ends_at', 'is_public', 'wager', 'commission'];

    protected $hidden = ['deleted_at'];

    public function owner () : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
