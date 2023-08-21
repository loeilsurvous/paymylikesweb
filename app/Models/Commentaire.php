<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
	protected $keyType = 'uuid';
    protected $fillable = ['id', 'contenu', 'date_commmentaire'];

    protected $hidden = ['deleted_at'];
}
