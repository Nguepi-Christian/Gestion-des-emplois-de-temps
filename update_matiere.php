<?php 

require 'connection.php';
require 'matiere.php';

$con=new connection();
$db_obj=$con->getconnection();

$mat=$_POST['nom'];
$ncode=$_POST['ncodeue'];
$fcodeue=$_POST['fcodeue'];

$matiere=new matiere($db_obj);

$matiere->updateone($fcodeue,$ncode,$mat);

header('location:page_matiere.php');

?>