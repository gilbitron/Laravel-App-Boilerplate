<?php namespace Gilbitron\LaravelAppBoilerplate;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;

class User extends \Eloquent implements UserInterface{

	use UserTrait;

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
	protected $hidden = array('password');

	/**
	* The attributes that can be mass assigned
	*
	* @var array
	*/
	protected $fillable = array('email', 'password', 'name');

	/**
	* Automatically hash a password when it is being set
	*/
	public function setPasswordAttribute($pass)
	{
		$this->attributes['password'] = \Hash::make($pass);
	}

}
