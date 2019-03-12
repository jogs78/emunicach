<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function rules(){
		return array(
			'name'=>array('required'),
			'username'=>array('required', 'regex:/^[a-z0-9_-]{3,15}$/'),			
			'password'=>array('required'),
			//'user_group'=>array('required'),
			'permissions'=>array('required')
		);
	}

	public function attributeLabels(){
		return array(
			'name'=>'Nombre',
			'username'=>'Nombre de usuario',
			'password'=>'Contraseña',
			//'user_group'=>'Tipo de usuario',
			'permissions'=>'Permisos'
		);
	}

	public function saveUser($param){
		DB::beginTransaction();
        try {

        	$permissions = null;
        	if(isset($param['permissions']))
        		$permissions = $param['permissions'];        	
        	try {        		

		      $user = Sentry::createUser(array(
		        'email' => $param['username'],
		        'password' => $param['password'],
		        'activated' => 1,
		        'first_name' =>$param['name'],
		        'permissions'=>$permissions
		      ));
		    } catch (Cartalyst\Sentry\Users\UserExistsException $e) {}

		    try
			{
			    $group = Sentry::findGroupByName($param['group']);			    
			    $user->addGroup($group);			    
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e){}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e){}
        }catch (ValidationException $e) {
            DB::rollback();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return true;
	}

	public function updateUser($param){
		DB::beginTransaction();
        try {
        	$permissions = null;
        	if(isset($param['permissions']))
        		$permissions = $param['permissions'];        	
        	try {        		

		      $user = Sentry::createUser(array(
		        'email' => $param['username'],
		        'password' => $param['password'],
		        'activated' => 1,
		        'first_name' =>$param['name'],
		        'permissions'=>$permissions
		      ));
		    } catch (Cartalyst\Sentry\Users\UserExistsException $e) {}

		    try
			{
			    $group = Sentry::findGroupByName($param['group']);			    
			    $user->addGroup($group);			    
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e){}
			catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e){}
        }catch (ValidationException $e) {
            DB::rollback();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return true;
	}
}
