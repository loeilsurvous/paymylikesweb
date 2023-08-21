<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
	protected $keyType = 'uuid';
    protected $fillable = ['id', 'typePub', 'contenu_pub', 'date_pub','fileName'];

    protected $hidden = ['deleted_at'];
}
