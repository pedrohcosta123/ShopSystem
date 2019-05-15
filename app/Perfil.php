<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
	protected $table = 'perfil';
    protected $fillable = ['nome','status', 'updated_at', 'created_at'];
}
