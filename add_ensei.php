<?php 

require('connection.php');
require('enseignant.php');
require('Random.php');

$con=new connection();
$db_obj=$con->getconnection();

$random=new Random();
$matricule=$random->Generate();

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$grade=$_POST['grade'];



$enseignant=new enseignant($db_obj);


if($enseignant->add($matricule,$nom,$prenom,$grade)){
    header('location:page_enseignants.php');
}else{
    echo ' an error ' ;
}

?>