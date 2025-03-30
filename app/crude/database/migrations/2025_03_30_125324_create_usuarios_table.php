<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('usuarios', function (Blueprint $table) {
			$table->id(); // ID automático
			$table->string('nome', 100);
			$table->string('email')->unique();
			$table->string('senha');
			$table->string('telefone', 15)->nullable();
			$table->text('endereco')->nullable();
			$table->date('data_nascimento')->nullable();
			$table->boolean('ativo')->default(true);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('usuarios');
	}
};
