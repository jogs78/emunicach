<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MenuTableSeeder extends Seeder {

	public function run()
	{
		DB::beginTransaction();
		try {
			DB::table('menu')->delete();
			DB::table('menu')->insert(array(
				array('id'=>1,'nombre'=>"EMunicach", 'padre'=>0,'estatus'=>1, 'registrado_por'=>1),
				array('id'=>2,'nombre'=>"Alumnos", 'padre'=>0,'estatus'=>1, 'registrado_por'=>1),
				array('id'=>3,'nombre'=>"Posgrado", 'padre'=>0,'estatus'=>1, 'registrado_por'=>1),
				array('id'=>4,'nombre'=>"Licenciaturas", 'padre'=>0,'estatus'=>1, 'registrado_por'=>1),
				array('id'=>5,'nombre'=>"PreUniversitario", 'padre'=>0,'estatus'=>1, 'registrado_por'=>1),
				array('id'=>6,'nombre'=>"Centro de Iniciación Musical", 'padre'=>0,'estatus'=>1, 'registrado_por'=>1),
				array('id'=>7,'nombre'=>"Educación Continua", 'padre'=>0,'estatus'=>1, 'registrado_por'=>1),
				array('id'=>8,'nombre'=>"Más", 'padre'=>0,'estatus'=>1, 'registrado_por'=>1),
			));
		} catch (ValidationException $e) {
			DB::rollback();
		} catch (\Exception $e) {
			DB::rollback();
			throw $e;
		}
		DB::commit();
	}

}