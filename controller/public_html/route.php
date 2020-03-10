<?php
	session_start();
	require_once __DIR__ . "/../vendor/autoload.php";
	use App\Model\Utilities as Utils;

	$handler = new \App\Controller\Handler();

	if(!isset($_GET['path'])) {
		$handler->user->redirect();
	}

	$route = Utils::dataFilter($_GET['path']);

	//$acceptable_routes = ['services'];
	//if(!in_array($route, $acceptable_routes)) {
	//	$handler->user->redirect();
	//} else {
	//	$handler->user->redirect($route);
	//}

	$render_data = [
		'tag'    => $route,
		'title'  => $route //TODO: set page title
	];

	switch($route) {
		default: $handler->user->redirect();
		case 'services':
			$render_data['services'] = $handler->getServicesNamesList();
			break;
		case 'api': break;
	}

	$handler->render($render_data);
