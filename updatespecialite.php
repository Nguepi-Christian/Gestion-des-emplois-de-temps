<?php 

require 'connection.php';
require 'specialite.php';

$con=new connection();
$db_obj=$con->getconnection();


$nspecialite=$_POST['nspecialite'];
$fspecialite=$_POST['fspecialite'];

$sp=new specialite($db_obj);

$sp->updateone($nspecialite,$fspecialite);

header('location:page_specialite.php');

?>