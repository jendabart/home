<?php
abstract class Controller{
	protected $data = array();
	protected $template = "";
	protected $database;

	public function __construct($database = ""){
		$this->database = $database;
	}

	abstract function run($param);

	public function renderTemplate(){
		if($this->template){
			extract($this->data);
			require("app/templates/".$this->template.".phtml");
		}
	}

	public function redirectTo($url){
        header("Location: /$url");
        header("Connection: close");
        exit;
	}
}