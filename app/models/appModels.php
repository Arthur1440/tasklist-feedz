<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Status extends Eloquent
{
  protected $table = 'status';
}

class Tasks extends Eloquent
{
  protected $table = 'tasks';

 public function Status() {
    return $this->hasOne('Status','id', 'status_id');
  }

  public function Users() {
    return $this->hasOne('Users','id', 'users_id');
  }
}

class Users extends Eloquent
{
	protected $table = 'users';
	
	protected $fillable = [
		'email',
		'password',
	];
}	