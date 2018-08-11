<?php
class Application{
	
	public function run(){
		$router = new RouterController();
		$router->run(array($_SERVER['REQUEST_URI']));
		$router->renderTemplate();
	}
}