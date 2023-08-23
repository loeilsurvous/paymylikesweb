<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
	protected $keyType = 'uuid';
    public const SIMPLE = 'simple';
    public const JACKPOT = 'jackpot';
    public const REAL = 'real';
    public const DIRECT = 'direct';
    public const TYPE = [

    ];
    protected $fillable = ['id', 'typePub', 'contenu_pub', 'date_pub','fileName', 'user_id', 'jackpot_id'];

    protected $hidden = ['deleted_at'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function jackpot (): BelongsTo {
        return $this->belongsTo(Jackpot::class);
    }
}
