<?php

/**
 * 	Auteur:User 128
 *  Creé le samedi 7 mai 2022 
 */


class timetable{
	
	private $database; //La base de donnee pour lancer nos transactions 

	private $salle;      	//
	private $heure;	//
	private $heure_fin;		//
	private $jours;		 	//
	private $cours;		 	//
	private $enseignant; 	//
	private $filiere;	 	//
	private $specialite; 	//
	private $niveau;		//
	private $semestre;		//


	//Contruction de l'objet emploi de temps 
	public function __construct($salle,$heure,$jours,$cours,$enseignant,$filiere,$specialite,$semestre,$niveau){
		$this->salle=$salle;
		$this->heure=$heure;
		//$this->heure_fin=$heure_fin;
		$this->jours=$jours;
		$this->cours=$cours;
		$this->enseignant=$enseignant;
		$this->filiere=$filiere;
		$this->specialite=$specialite;
		$this->semestre=$semestre;
		$this->niveau=$niveau;	
	}

	//Start here for Create 
	public function create(){
		$query_for_insert=$this->database->prepare('INSERT INTO timetable VALUES(?,?,?,?,?,?,?,?,?)');
		$result=$query_for_insert->execute(
									array(
										 $this->salle,
										 $this->jours,
										 $this->heure,
										 $this->enseignant,
										 $this->filiere,
										 $this->cours,
										 $this->specialite,
										 $this->semestre,
										 $this->niveau
										)
								);
		//Verification que linsertion s'est executé et qu'une ligne a ete ajouter 
		if ($result) {
			return 'true';		//tout Ok
		}else{
			return 'false';		//Il y'a un probleme
		}

	}
	//End here for Create 


	/*
	 *	Fonction qui se charge de verifier s'il y'a chevauchement 
	 *	Cele pour eviter de programer plusieurs cours dans une meme salle 
	 *  a des heures de debut et fin egales
	 */
	public function check($salle,$heure,$jour){
		$status="";
		$query_for_check=$this->database->prepare('SELECT salle,heure,jour
												   FROM timetable');
												 
		$result=$query_for_check->execute(
										array(
											$salle,
											$heure,
											$jour
										)
									);

		//Si dans la base il y'a deja plus de 0 element qui on les meme heures
		//de debut et de fin,les memes jours et les memes salles alors c'est pas 
		//d'inserer cette emplois  

		while($donnees = $query_for_check->fetch(PDO::FETCH_ASSOC)){
			if($donnees['heure']==$heure && $donnees['jour']==$jour && $donnees['salle']==$salle){
				$status="true";
				break;
			}
			else{
				$status="false";
			}
		}
		return $status;
	}

	//End here ... 

	public function update($salle,$heure,$jours,$cours,$enseignant,$filiere,$specialite,$semestre,$niveau,$room,$hour,$day){
		$query_for_update=$this->database->prepare("UPDATE timetable 
												    SET salle=?,
												   		jour=?,
														heure=?,
														enseignant=?,
														filiere=?,
														cours=?,
														specialite=?,
														semestre=?,
														niveau=?
													WHERE jour=? AND heure=? AND salle=? ");

		$result_update=$query_for_update->execute(array($salle,$heure,$jours,$enseignant,$filiere,$specialite,$cours,$semestre,$niveau,$day,$hour,$room,));

		return $result_update;
	}
	//read
	public function read(){
		$time=array();

        $query_for_read=$this->database->query('SELECT DISTINCT filiere,specialite,semestre,niveau FROM timetable');
        while($result=$query_for_read->fetch(PDO::FETCH_ASSOC)){
            $time[]=new timetable(null,null,null,null,null,$result['filiere'],$result['specialite'],$result['semestre'],$result['niveau']);
        }
     	
		return $time;
	}


	///read all data
	public function readAll_Where($specialite,$filiere,$niveau,$semestre){
		$timeAll=array();

        $query_for_read=$this->database->prepare('SELECT * 
												FROM timetable t,enseignant e,cours c
												WHERE e.idenseig=t.enseignant
												AND c.codeue=t.cours
												AND t.specialite=?
												AND t.filiere=?
												AND t.niveau=?
												AND t.semestre=?');
		$result_red=$query_for_read->execute(array($specialite,$filiere,$niveau,$semestre));										
        while($result=$query_for_read->fetch(PDO::FETCH_ASSOC)){
			//$salle,$heure,$jours,$cours,$enseignant,$filiere,$specialite,$semestre,$niveau
            $timeAll[]=new timetable($result['salle'],$result['heure'],$result['jour'],$result['nommatiere'],$result['nom'].' '.$result['prenom'],null,null,null,null);
        }
     	
		return $timeAll;
	}

	//


	public function readAll_for($denseig){
		$timeAllfor=array();

        $query_for_read=$this->database->prepare('SELECT * 
												  FROM timetable t
												  WHERE enseignant=?
												  AND t.cours=c.codeue');
		$result_red=$query_for_read->execute(array($denseig));										
        while($result=$query_for_read->fetch(PDO::FETCH_ASSOC)){
			//$salle,$heure,$jours,$cours,$enseignant,$filiere,$specialite,$semestre,$niveau
            $timeAllfor[]=new timetable($result['salle'],$result['heure'],$result['jour'],$result['codeue'].'  '.$result['nommatiere'],
			$result['enseignant'],$result['specialite'],$result['filiere'],$result['semestre'],$result['niveau']);
        }
     	
		return $timeAllfor;
	}
	
	//end 
	public function setDB(PDO $database){
		$this->database=$database;
	}


	public function getniveau(){
		return $this->niveau;
	}
	public function getsemestre(){
		return $this->semestre;
	}
	public function getfiliere(){
		return $this->filiere;
	}
	public function getspecialite(){
		return $this->specialite;
	}
	public function getheure(){
		return $this->heure;
	}
	public function getsalle (){
		return $this->salle;
	}
	public function getjours(){
		return  $this->jours;
	}
	public function getenseignant (){
		return $this->enseignant;
	}
	public function getcours (){
		return $this->cours;
	}
}



?>