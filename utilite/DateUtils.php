<?php
class DateUtils{
	
	

	public function __construct($date = ''){
		if(ctype_digit($date))
			$date = '@'.$date;
		
	}

	

}