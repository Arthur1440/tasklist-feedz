<?php
$mw = function () {
	if(isset($_SESSION[SESSION_LOGIN])) {
	  header('Location: ' . _BASEURL.'/tasklist');
	}
};
// index page
$app->get('/', 'loginController:index');

// check user and password
$app->post('/', 'loginController:checkUser');

$app->get("/logout", 'loginController:logout');

//$app->get("/tasklist", 'loginController:home');

$app->group('/tasks', function () use ($app) {
    $app->get('', 'taskControllers:index');
    $app->get('/criar', 'taskControllers:createTask');
	$app->get("/:id", "taskControllers:getTask");
	$app->post('/save(/:id)', 'taskControllers:saveUpdateTasks');
	$app->post('/delete/:id', 'taskControllers:deleteTasks');
});




# Listagem
$app->get("/guitars", "GuitarController:guitars");

# Form Insert e Update
$app->get("/guitar/insert", "GuitarController:guitarFormInsert");
$app->get("/guitar/update/:id", "GuitarController:guitarFormUpdate");

# Ações CRUD
$app->post("/guitar", "GuitarController:guitarCreate");
$app->put("/guitar/:id", "GuitarController:guitarUpdate");
$app->delete("/guitar/:id", "GuitarController:guitarDelete");

/*$app->notFound(function () use ($app) {
    $app->response->setStatus(404);
    //output 'access denied', redirect to login page or whatever you want to do.
});*/