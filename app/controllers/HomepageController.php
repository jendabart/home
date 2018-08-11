<?php
class HomepageController extends Controller{

	public function run($param){

		$this->data['title'] = "Home Sweet Home";
		$this->template = "homepage";
	}
}