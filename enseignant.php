<?php

class enseignant{


    private $database;
    private $nom,$prenom,$grade,$matricule;

    public function __construct($db){
        $this->database=$db;
    }

    public function setInfo($matricule,$nom,$prenom,$grade){
        $this->matricule=$matricule;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->grade=$grade;
    }

    public function add($matricule,$nom,$prenom,$grade){

        $query_for_insert=$this->database->prepare('INSERT INTO enseignant VALUES(?,?,?,?)');
        $query_for_insert->execute(array($matricule,$nom,$prenom,$grade));

        if($query_for_insert){
            return true;
        }else{
            return false;
        }
    }

    public function read(){

        $enseignant=array();

        $query_for_read=$this->database->query('SELECT * FROM enseignant');
        
        while($result=$query_for_read->fetch(PDO::FETCH_ASSOC)){
            $temp_enseig=new enseignant($this->database);
            $temp_enseig->setInfo($result['idenseig'],$result['nom'],$result['prenom'],$result['grade']);
            $enseignant[]=$temp_enseig;
        }
     return $enseignant;
    }

    public function delete($id){
        $query_delete=$this->database->prepare('DELETE FROM enseignant WHERE idenseig=?');
        $state=$query_delete->execute(array($id));

        return $state;
    }

    public function updateens($fmat,$nmat,$nname,$np,$grade){
        $query_update=$this->database->prepare("UPDATE enseignant SET idenseig=?,nom=?,prenom=?,grade=?
                                                WHERE idenseig=?");
        $result_update=$query_update->execute(array($nmat,$nname,$np,$grade,$fmat));
        return $result_update;
    }

    public function getname(){
        return $this->nom;
    }
    public function getprenom(){
        return $this->prenom;
    }
    public function getgrade(){
        return $this->grade;
    }
    public function getmatricule(){
        return $this->matricule;
    }



}






?>