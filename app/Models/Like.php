<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public $incrementing = false;
	protected $keyType = 'uuid';
    protected $fillable = ['id', 'nbre_like'];

    protected $hidden = ['deleted_at'];
}
