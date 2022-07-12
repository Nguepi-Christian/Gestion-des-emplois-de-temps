<?php 
require('connection.php');
require('filiere.php');

$con=new connection();
$db_obj=$con->getconnection();

$fili=$_POST['filiere'];

$filiere=new filiere($db_obj);

if($filiere->add($fili)){
    header('location:page_filiere.php');
}else{
    echo ' an error ' ;
}

?>