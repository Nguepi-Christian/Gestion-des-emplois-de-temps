<?php

/**
 * Auteur : User128 
 * Creé le Dimanche 8 mai 2022 
 * Classe de connection a la base de donnee 
 */


class connection{
	
	private $database;

	public function __construct(){
		try {
			$this->database=new PDO('mysql:host=localhost;dbname=emploidetemps','root','');  //connection a la BD
		} catch (PDOExeption $e) {
			echo "Erreur PDO de la classe connection ".$e->getMessage();           //Une erreur peut se produire...
		}
	}

	//Recuperation de la BD apres la connection 
	public function getconnection(){
		return $this->database;
	}



}




?>