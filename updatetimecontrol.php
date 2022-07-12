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

   $room=$_POST['room'];
   $hour=$_POST['hour'];
   $day=$_POST['day'];
    $connexion=new connection();           
	$database=$connexion->getconnection();      
   
	$timetable_object=new timetable($salle,$heure,$jours,$matiere,$enseignant,$filiere,$specialite,$semestre,$niveau);	
	$timetable_object->setDB($database);																									
    $statu=$timetable_object->update($salle,$heure,$jours,$matiere,$enseignant,$filiere,$specialite,$semestre,$niveau,$room,$hour,$day);

    //echo $statu;

  header('location:disponible.php');



?>