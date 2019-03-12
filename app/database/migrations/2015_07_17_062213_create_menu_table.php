<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('menu');
		Schema::create('menu', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre', 45);
			$table->tinyInteger('padre')->unsigned()->nullable();
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
		Schema::dropIfExists('menu');
	}

}
