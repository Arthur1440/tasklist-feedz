<?php

//use app\models\appModels;
use Slim\Slim as Slim;

class taskControllers
{
	public $app;

	function __construct() {
		$this->app = Slim::getInstance();
		if(isset($_SESSION[SESSION_LOGIN])){
			$this->app->view->setData('userName', $_SESSION[SESSION_LOGIN]['name']);

		}else{
			$this->app->redirect('/');

		}
	}

	public function index()
	{
		$tasks = Tasks::where('active', '=', ACTIVE)
						->with('Status')
                    	->with('Users')
                    	->orderBy('updated_at','DESC')
		                ->get()
		                ->toArray();

    	$this->app->view->setData('tasks', $tasks);
	    return $this->app->render("tasks.html");
	}

	public function getTask($id)
	{
		$task = Tasks::where('id', '=', $id)
						->where('active', '=', ACTIVE)
						->with('Status')
	                	->with('Users')
	                	->orderBy('updated_at','DESC')
		                ->get()
		                ->toArray();

		$status = Status::orderBy('id','ASC')
		                ->get()
		                ->toArray();

		$users = Users::orderBy('name','ASC')
		                ->get()
		                ->toArray();

		$this->app->view->setData('task_id', $id);
		$this->app->view->setData('task', $task);
		$this->app->view->setData('status', $status);
		$this->app->view->setData('users', $users);
	    return $this->app->render("updateTasks.html");
	}

	public function createTask()
	{

		$status = Status::orderBy('id','ASC')
		                ->get()
		                ->toArray();

		$users = Users::orderBy('name','ASC')
		                ->get()
		                ->toArray();

    	$this->app->view->setData('status', $status);
    	$this->app->view->setData('users', $users);
	    return $this->app->render("createTasks.html");
	}

	public function saveUpdateTasks( $id = false ) 
	{

		if ( $id ) {
			$tasks = Tasks::find($id);
			$this->app->view->setData('response', ['msg' => 'Cadastro Atualizado!', 'code' => 'update' ]);

		} else {
			$tasks = new Tasks();
			$this->app->view->setData('response', ['msg' => 'Cadastro salvo!', 'code' => 'insert' ]);
		}

		$tasks->title   = $this->app->request->params('title');
		$tasks->description   = $this->app->request->params('description');
		$tasks->status_id   = $this->app->request->params('status_id');
		$tasks->users_id   = $this->app->request->params('users_id');

		$tasks->save();

		return $this->index();

	}

	public function deleteTasks( $id = false )
	{

		if ($id) {
			$tasks = Tasks::find($id);
			$this->app->view->setData('response', ['msg' => 'Cadastro removido!', 'code' => 'delete' ]);
			$tasks->active   = $this->app->request->params(0);
			$tasks->save();

		} else {
			$tasks = new Tasks();
			$this->app->view->setData('response', ['msg' => 'Cadastro não localizado!', 'code' => 'error' ]);
		}

		return $this->index();
	}
}