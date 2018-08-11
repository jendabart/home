<?php
class ErrorController extends Controller{

	public function run($param){

		header("HTTP/1.0 404 Not Found");
		$this->data['title'] = "Chyba 404!!!";
		$this->template = "error";
	}
}