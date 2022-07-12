<?php

require('connection.php');
require('timetable.php');


    $salle=$_POST['salle'];
    $heure=$_POST['heure'];
    $jours=$_POST['jour'];
    $matiere=$_POST['matiere'];
    $enseignant=$_POST['enseignant'];
	$specialite=$_POST['specialite'];

    $filiere=$_POST['filiere'];
    $niveau=$_POST['niveau'];
    $semestre=$_POST['semestre'];

    $connexion=new connection();            	//Objet connection pour communiquer avec la base de data
	$database=$connexion->getconnection();      //Chargement de la base de donnée dans la variable
    //$salle,$heure,$jours,$cours,$enseignant,$filiere,$specialite,$semestre,$niveau
	$timetable_object=new timetable($salle,$heure,$jours,$matiere,$enseignant,$filiere,$specialite,$semestre,$niveau);	
	$timetable_object->setDB($database);																									//Objet timetable cree 
    $statu=$timetable_object->create();

    echo $statu;





?>