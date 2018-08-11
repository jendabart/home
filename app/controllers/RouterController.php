<?php
class RouterController extends Controller{
	protected $controller;

	public function run($param){
		$onParseUrl = $this->parseURL($param[0]);
		if(empty($onParseUrl[0]))
			$this->redirectTo('homepage');
		$nameOfController = $this->camelCase(array_shift($onParseUrl))."Controller";
		if(file_exists('app/controllers/'.$nameOfController.'.php'))
			$this->controller = new $nameOfController;
		else
			$this->redirectTo('error');
		$this->controller->run($onParseUrl);

		$this->template = "layout";

	}

	private function parseURL($url){
		$onparseURL = parse_url($url);
		$onparseURL["path"] = ltrim($onparseURL["path"], "/");
		$onparseURL["path"] = trim($onparseURL["path"]);
		$routeInArray = explode("/", $onparseURL["path"]);
		return $routeInArray;
	}
	private function camelCase($text){
		$camelCase = str_replace('-', ' ', $text);
		$camelCase = ucwords($camelCase);
		$camelCase = str_replace(' ', '', $camelCase);
		return $camelCase;
	}
}