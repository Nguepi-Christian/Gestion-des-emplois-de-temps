<?php

require('connection.php');
require('salle.php');

$con=new connection();
$db_obj=$con->getconnection();


$nom=$_POST['nom'];
$capacite=$_POST['capacite'];



$salle=new salle($db_obj);


if($salle->add($nom,$capacite)){
    header('location:page_salle.php');
}else{
    echo ' an error ' ;
}

?>