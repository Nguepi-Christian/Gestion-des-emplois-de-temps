<?php

class specialite{

    private $database;
    private $nom;

    public function __construct($db){
        $this->database=$db;
    }

    public function setInfo($nom){
        $this->nom=$nom;
    }

    public function add($nom){

        $query_for_insert=$this->database->prepare('INSERT INTO specialite VALUE(?)');
        $query_for_insert->execute(array($nom));

        if($query_for_insert){
            return true;
        }else{
            return false;
        }
    }

    public function read(){

        $apecialite=array();

        $query_for_read=$this->database->query('SELECT * FROM specialite');
        
        while($result=$query_for_read->fetch(PDO::FETCH_ASSOC)){
            $temp_apecialite=new specialite($this->database);
            $temp_apecialite->setInfo($result['nom']);
            $apecialite[]=$temp_apecialite;
        }
     return $apecialite;
    }

    public function delete($id){
        $query_delete=$this->database->prepare('DELETE FROM specialite WHERE nom=?');
        $state=$query_delete->execute(array($id));

        return $state;
    }

    public function updateone($nspecialite,$fspecialite){
        $query_update=$this->database->prepare('UPDATE specialite SET nom=? WHERE nom=?');
        $result_update=$query_update->execute(array($nspecialite,$fspecialite));
        return $result_update;
    }


    public function getspacialite(){
        return $this->nom;
    }

}


?>