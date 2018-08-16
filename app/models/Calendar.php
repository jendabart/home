<?php
class Calendar{
	private $dateTime;
	public $daysOfWeek = array('Pondělí', 'Úterý', 'Středa', 'Čtvrtek', 'Pátek', 'Sobota', 'Neděle');

	public function __construct($date = ''){		
		if(ctype_digit($date))
			$date = '@'.$date;
		$this->dateTime = new DateTime($date);
	}

	public function renderCalendar(){
		$calendar = "<table class='calendar'>";
		/**************** HLAVICKA **************/
		$calendar .= "<thead><tr>";
		foreach($this->daysOfWeek as $i){
			$calendar .= "<td>$i</td>";
		}
		$calendar .= "<tr></thead><tbody>";
		/********** TELO ***************/
		$counter = 1;
		$calendar .= "<tr>";
		$daysOff = date('N', $this->getTimeStamp()) - 1;

		for($i = 1, $a = 1, $dayO = $daysOff; $i <= ($this->getDaysInMonth() + $daysOff); $i++){
			/* zjisti jestli v ten den je nejaka udalost */
			$day = $this->getEventOfDay($a);
			/*preskakovac prazdnych dnu na zacatku mesice*/
			if($dayO != 0){
				$dayO--;
				$calendar .= "<td></td>";
			}
			/*************** samotny vypis *******************************/
			elseif($dayO == 0 && $counter <= 7){
				$calendar .= "<td>$day</td>";
				$a++;
			}
			else{
				$counter = 1;
				$calendar .= "</tr><tr><td>$day</td>";
				$a++;
			}
			$counter++;

		}
		/********** KONCE TABULKY***********/
		$calendar .= "</tr>";
		$calendar .= "</tbody></table>";
		return $calendar;
	}

	private function getDaysInMonth(){
		return cal_days_in_month(CAL_GREGORIAN, $this->dateTime->format('n'), $this->dateTime->format('Y'));
	}

	private function getTimeStamp(){
		$a = new DateTime('1.'.$this->dateTime->format('n.Y'));
		return $a->getTimestamp();
	}
	private function getEventOfDay($day){
		$daysFromDB = array(15,1,10);
		if(in_array($day, $daysFromDB)){
			return "<span class='event'>$day</span>";
		}
		else{
			return $day;
		}
	}
}