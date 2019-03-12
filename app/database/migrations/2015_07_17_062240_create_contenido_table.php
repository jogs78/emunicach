<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContenidoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contenido', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('titulo', 255);
			$table->text('descrip');
			$table->text('conten');
			$table->tinyInteger('idmenu')->unsigned()->nullable();
			$table->boolean('estatus')->default(0);
			$table->smallInteger('registrado_por')->unsigned();
            $table->timestamp('fecha_registro')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->smallInteger('modificado_por')->unsigned()->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contenido');
	}

}
