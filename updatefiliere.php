<?php 

require 'connection.php';
require 'filiere.php';

$con=new connection();
$db_obj=$con->getconnection();


$nfiliere=$_POST['nfiliere'];
$ffiliere=$_POST['ffiliere'];

$filiere=new filiere($db_obj);

$filiere->updateone($nfiliere,$ffiliere);

header('location:page_filiere.php');

?>