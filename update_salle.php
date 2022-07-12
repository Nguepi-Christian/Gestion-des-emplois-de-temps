<?php

require 'connection.php';
require 'salle.php';

$statu="";

$sal=$_POST['salle'];
$capacite=$_POST['capacite'];
$fsal=$_POST['fsalle'];

$con=new connection();
$db_obj=$con->getconnection();

$salle=new salle($db_obj);

$statu=$salle->updatesalle($sal,$capacite,$fsal);

echo $statu;
header('location:page_salle.php');