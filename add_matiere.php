<?php 
require('connection.php');
require('matiere.php');

$con=new connection();
$db_obj=$con->getconnection();

$codeue=$_POST['codeue'];
$nom=$_POST['nom'];

$matiere=new matiere($db_obj);

if($matiere->add($codeue,$nom)){
    header('location:page_matiere.php');
}else{
    echo ' an error ' ;
}

?>