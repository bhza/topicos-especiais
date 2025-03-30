<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table = 'usuarios';

	protected $fillable = [
		'nome',
		'email',
		'senha',
		'telefone',
		'endereco',
		'data_nascimento',
		'ativo',
	];

	protected $hidden = [
		'senha',
	];
}
