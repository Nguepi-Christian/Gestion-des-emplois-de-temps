<?php 
require('connection.php');
require('specialite.php');

$con=new connection();
$db_obj=$con->getconnection();

$specia=$_POST['specialite'];

$specialite=new specialite($db_obj);

if($specialite->add($specia)){
    header('location:page_specialite.php');
}else{
    echo ' an error ' ;
}

?>