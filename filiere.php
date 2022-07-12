<?php

class filiere{

    private $database;
    private $filiere;

    public function __construct($db){
        $this->database=$db;
    }

    public function setInfo($filiere){
        $this->filiere=$filiere;
    }

    public function add($filiere){

        $query_for_insert=$this->database->prepare('INSERT INTO filiere VALUES(?)');
        $query_for_insert->execute(array($filiere));

        if($query_for_insert){
            return true;
        }else{
            return false;
        }
    }

    public function read(){

        $filiere=array();

        $query_for_read=$this->database->query('SELECT * FROM filiere');
        
        while($result=$query_for_read->fetch(PDO::FETCH_ASSOC)){
            $temp_filiere=new filiere($this->database);
            $temp_filiere->setInfo($result['filiere']);
            $filiere[]=$temp_filiere;
        }
     return $filiere;
    }
    public function updateone($nfiliere,$ffiliere){
        $query_update=$this->database->prepare('UPDATE filiere SET filiere=? WHERE filiere=?');
        $result_update=$query_update->execute(array($nfiliere,$ffiliere));
        return $result_update;
    }


    public function delete($id){
        $query_delete=$this->database->prepare('DELETE FROM filiere WHERE filiere=?');
        $state=$query_delete->execute(array($id));

        return $state;
    }


    public function getfiliere(){
        return $this->filiere;
    }
    
   



}


?>