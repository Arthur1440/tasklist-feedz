<?php

//use app\models\appModels;
use Slim\Slim as Slim;

class loginController
{

	public $app;

	function __construct() {
		$this->app = Slim::getInstance();
	}
		
	public function index()
	{
		if(isset($_SESSION[SESSION_LOGIN])) {
			$this->app->redirect('/tasks');
		}

	    return $this->app->render("index.html");
	}
	
	public function checkUser()
	{
        $useremail 	= $this->app->request->params('txtEmail');
		$userpwd 	= $this->app->request->params('txtPwd');
		$users 		= Users::where('email', '=', $useremail)->get();

		if(sizeof($users) > 0) {
            if (password_verify($userpwd, $users->toArray()[0]['password'])) {
				$message = "Login valido!";
				$code	 = "success";
                $_SESSION[SESSION_LOGIN]['id'] = $users->toArray()[0]['id'];
                $_SESSION[SESSION_LOGIN]['name'] = $users->toArray()[0]['name'];
                $_SESSION[SESSION_LOGIN]['email'] = $users->toArray()[0]['email'];

            } else {
			    $this->app->view->setData('response', [
						'errors' => 'Email e/ou Senha Invalidos!',
						'code' => 'error-email'
						]);
			}

		} else {
		    $this->app->view->setData('response', [
					'errors' => 'Email e/ou Senha Invalidos!',
					'code' => 'error-email'
					]);
		}

		if(isset($_SESSION[SESSION_LOGIN])) {
			$this->app->redirect('/tasks');
		}

	    return $this->app->render("index.html");

	}
	
    public function logout() 
    {
        session_unset();
        session_destroy();
        session_write_close();
        unset($_SESSION);
		$this->app->redirect(_BASEURL);
    }
}