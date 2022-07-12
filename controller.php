<?php

//Importation des dependence
require('connection.php');
require('timetable.php');


   /*echo "   ".*/ $jour=$_POST['jour'];
   /*echo '   '.*/$heure=$_POST['heure'];
   /*echo '   '.*/$salle=$_POST['salle'];
	
	$connexion=new connection();            	//Objet connection pour communiquer avec la base de data
	$database=$connexion->getconnection();      //Chargement de la base de donnée dans la variable
   //$salle,$heure,$jours,$cours,$enseignant,$filiere,$specialite,$semestre,$niveau
	$timetable_object=new timetable($salle,$heure,$jour,null,null,null,null,null,null);	
	$timetable_object->setDB($database);																									//Objet timetable cree 
   $statu=$timetable_object->check($salle,$heure,$jour);						                                                  //Verification des contrintes.

   //Recuperation des valeurs

   

    //echo '  Le status renvoyer par le server est '. $statu;
      echo $statu;
?>