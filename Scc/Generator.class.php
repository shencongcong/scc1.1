<?php
/*2016-4-24*/

namespace Scc;

abstract class Generator
{
	private $observers = array();
	function addObserver(Observer $observer)
	{
		$this->observers[] = $observer;
	}
	function notify()
	{
		foreach($this->observers as $observer)
		{
			$observer->update();
		}
	}
}