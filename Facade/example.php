<?php

class User {	
		
	public function save() {
		// llamada al ORM
	}
}


class Role {

	public static function getById(int $id) {
		// llamada al ORM
	}
}


class DomainFacade {

	public static function addUser(array $data) {		
		$usuario = new User();
		$role = Role::getById($data['role_id']);
		$usuario->setRole($role);
		$usuario->setName($data['user_name']);
		$usuario->setPassword($data['password']);
		
		try {
			$usuario->save();
		} catch (Exception $e) {
			throw $e;					
		}
		
		return $usuario;	
	}	
}