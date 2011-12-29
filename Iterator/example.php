<?php

class User {
	public $email;
	public $address;
	public $city;
	public $state;
	public $zip;
}
//las interfaces Iterator y Countable son propias de PHP 5.* en adelante 
class User_Management implements Iterator, Countable {

	private $users = Array();
	private $position=0;
 
	public function current() {
		return $this->users[$this->position];
	}

	public function key() {
		return $this->position;
	}
 
	public function next() {
		++$this->position;
	}
 
	public function rewind() {
		$this->position = 0;
	}

	public function valid() {
		return (isset($this->users[$this->position]));
	}
 
	public function count()	{
		return count($this->users);
	} 
}

$iterator = new User_Management();
foreach ($iterator as $index => $value) {
	echo $value->address;
}

$iterator->rewind();
while ($iterator->valid()) {
	$value = $iterator->current();
	echo $value->address;
	$iterator->next();
}

$iterator->rewind();
for ($iterator->key(); $iterator->valid(); $iterator->next()) {
	$value = $iterator->current();
	echo $value->address;
}

?> 
