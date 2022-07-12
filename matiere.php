<?php

class matiere{


    private $database;
    private $codeue,$nommatiere;

    public function __construct($db){
        $this->database=$db;
    }

    public function setInfo($codeue,$nommatiere){
        $this->codeue=$codeue;
        $this->nommatiere=$nommatiere;
    }

    public function add($codeue,$nommatiere){

        $query_for_insert=$this->database->prepare('INSERT INTO cours VALUES(?,?)');
        $query_for_insert->execute(array($codeue,$nommatiere));

        if($query_for_insert){
            return true;
        }else{
            return false;
        }
    }

    public function read(){

        $cours=array();

        $query_for_read=$this->database->query('SELECT * FROM cours');
        
        while($result=$query_for_read->fetch(PDO::FETCH_ASSOC)){
            $temp_cours=new matiere($this->database);
            $temp_cours->setInfo($result['codeue'],$result['nommatiere']);
            $cours[]=$temp_cours;
        }
     return $cours;
    }


    public function delete($id){
        $query_delete=$this->database->prepare('DELETE FROM cours WHERE codeue=?');
        $state=$query_delete->execute(array($id));

        return $state;
    }

    public function updateone($fcodeue,$ncodeue,$matiere){
        $query_update=$this->database->prepare('UPDATE cours SET codeue=?,nommatiere=? WHERE codeue=?');
        $result_update=$query_update->execute(array($ncodeue,$matiere,$fcodeue));
        return $result_update;
    }


    public function getmatiere(){
        return $this->nommatiere;
    }

    public function getcodeue(){
        return $this->codeue;
    }
   



}






?>