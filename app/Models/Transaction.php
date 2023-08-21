<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $incrementing = false;
	protected $keyType = 'uuid';

    protected $fillable = [
        'id', 'amount', 'source_id', 'source_type', 'destination_id', 'destination_type'
    ];

    public function source () {
        return $this->morphTo();
    }
    public function destination () {
        return $this->morphTo();
    }
}
