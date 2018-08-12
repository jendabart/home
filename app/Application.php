<?php
class Application{
	private $database;

	public function run(){
		$this->initServices();
		$router = new RouterController($this->database);
		$router->run(array($_SERVER['REQUEST_URI']));
		$router->renderTemplate();
	}

	private function initServices(){
		$this->database = new MyDatabase();
	}
}