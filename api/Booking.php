<?php 
/***
title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false,
              backgroundColor: "#0073b7", //Blue
              borderColor: "#0073b7" //Blue
*/
class Booking {
	
	public $title;
	public $start;
	public $allDay = false;
	public $backgroundColor;
	public $borderColor;
	public $url;
	public $className;
	public $block = false;
		
	public function __constructor($t, $s) {
		$this->title = $t;
		$this->start = $s;
	}
	
	
}
?>