<?php

class salle{


    private $database;
    private $nom,$capacite;

    public function __construct($db){
        $this->database=$db;
    }

    public function setInfo($nom,$cap){
        $this->nom=$nom;
        $this->capacite=$cap;
    }

    public function delete($id){
        $query_delete=$this->database->prepare('DELETE FROM salle WHERE idsalle=?');
        $state=$query_delete->execute(array($id));

        return $state;
    }

    public function add($nom,$capacite){

        $query_for_insert=$this->database->prepare('INSERT INTO salle VALUES(?,?)');
        $query_for_insert->execute(array($nom,$capacite));

        if($query_for_insert){
            return true;
        }else{
            return false;
        }
    }

    public function read(){

        $salle=array();

        $query_for_read=$this->database->query('SELECT * FROM salle');
        
        while($result=$query_for_read->fetch(PDO::FETCH_ASSOC)){
            $temp_salle=new salle($this->database);
            $temp_salle->setInfo($result['idsalle'],$result['capacite']);
            $salle[]=$temp_salle;
        }
     return $salle;
    }

    public function updatesalle($salle,$capacite,$fsale){
        $query_update=$this->database->prepare('UPDATE salle SET idsalle= ?, capacite=? WHERE idsalle=?');
        $result_update=$query_update->execute(array($salle,$capacite,$fsale));

        return $result_update;
    }

    public function getnom(){
        return $this->nom;
    }
    public function getcapacite(){
        return $this->capacite;
    }
   



}






?>