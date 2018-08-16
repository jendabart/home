<?php
class HomepageController extends Controller{

	public function run($param){
		$calendar = new Calendar();
		$incomes = new PrijmyVydaje();

		$this->data['calendar'] = $calendar->renderCalendar();
		$this->data['title'] = "Home Sweet Home";
		$this->template = "homepage";
	}
}