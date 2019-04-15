<?php

// Подключение автозагрузки через composer
require __DIR__ . '/../vendor/autoload.php';

// Вывод ошибок на экран (для удобной отладки)
$configuration = [ 
	'settings' => [
		'displayErrorDetails' => true, 
	], 
]; 

$app = new \Slim\App($configuration); 

$container = $app->getContainer();
$container['renderer'] = new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');

$app->get('/users/{id}', function($request, $response, $args) {
	$params = ['id' => $args['id']];
	return $this->renderer->render($response, 'users/show.phtml', $params);
});
$app->get('/', function ($request, $response) { 
	return $response->write('Welcome to Slim!'); 
}); 

$app->get('/users', function ($request, $response) { 
	return $response->write('GET: users'); 
}); 

$app->post('/users', function ($request, $response) { 
	return $response->write('POST: users'); 
}); 

$app->run();
