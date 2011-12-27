<?php

interface Observer {
	public function notify($sender, $params);
}

abstract class Observable {
	
	protected $observers;
	
	public function __construct() {
		$this->observers = array();
	}
	
	public function registerObserver(Observer$observer)	{
		if(!in_array($observer, $this->observers))
		{
			$this->observers[] = $observer;
		}
	}
	
	public function unregisterObserver(Observer$observer) {
		if(in_array($observer, $this->observers)) {
			$key = array_search($observer, $this->observers);
			unset($this->observers[$key]);
		}
	}
	
	abstract public function notifyObservers();	
}

class UserService extends Observable {
	
	private $text;
	
	public function __construct() {
		parent::__construct();
		$this->text = '';
	}
	
	public function notifyObservers() {
		foreach($this->observers as $observer) {
			$observer->notify($this);
		}
	}
	
	public function keyPress($key) {
		$this->text.= $key;
		$this->params = array( 'timestamp' => time(), 'key' => $key);
		$this->notifyObservers();
	}
	
	public function getText() {
		return $this->text;
	}
}

class KeyLogger implements Observer {
	
	public function notify($sender, $params) {
		echo ' : ', $params['key'], PHP_EOL;
	}
}

class TimestampLogger implements Observer {
	
	public function notify($sender, $params) {
		echo date('h:i:s', $params['timestamp']);
	}
}

class EmailSender implements Observer {
	
	public function notify($sender, $params) {
		$body = 'Mail Body';
		EmailService::Send($body, $params['email']);
	}
}
