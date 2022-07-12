<?php 

require 'connection.php';
require 'enseignant.php';

$statu="";

$con=new connection();
$db_obj=$con->getconnection();


$enseignant=new enseignant($db_obj);

$fmat=$_POST['fmat'];
$nname=$_POST['nname'];
$np=$_POST['np'];
$grade=$_POST['grade'];
$nmat=$_POST['nmat'];


$statu=$enseignant->updateens($fmat,$nmat,$nname,$np,$grade);

header('location:page_enseignants.php');




?>