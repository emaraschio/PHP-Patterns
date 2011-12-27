<?php

interface EntityRepository {
    public function delete(int $id);
    public function update($obj);
    public function add($obj);
    public function getById(int $id);
    public function getAll();
}   

class UserRepository implements EntityRepository {
	
	/*
	 * Metodos que debo implementar por contrato
	 * */
	public function delete(ind $id) {
		//Llamada al ORM
	}		
	
	public function update($obj) {
		//Llamada al ORM
	}	
	
	public function add($obj) {
		//Llamada al ORM
	}	
	
	public function getById(ind $id) {
		//Llamada al ORM
	}	
	
	public function getAll() {
		//Llamada al ORM
	}		
	
	/**
	 * Metodos customs
	 * */
	public function getAllAdminUsers() {
		return $this->entityManager->createQuery('SELECT u FROM Domain\Model\User WHERE u.status = "admin" ')->getResult();
	}
	
	public function getAdminUserById(int $id) {
		return $this->entityManager->createQuery('SELECT u FROM Domain\Model\User WHERE u.status = "admin" AND u.id = '. $id)->getResult();
	}
}

$userRepository = new UserRepository();
$adminUsers = $userRepository->getAllAdminUsers();

$userId = 16;
$user = $userRepository->getAdminUserById($userId);
