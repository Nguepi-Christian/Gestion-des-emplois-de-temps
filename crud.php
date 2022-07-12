<?php
require 'connection.php';
require 'enseignant.php';
require 'salle.php';
require 'matiere.php';
require 'specialite.php';
require 'filiere.php';

$statu="";

$con=new connection();
$db_obj=$con->getconnection();

$salle=new salle($db_obj);
$enseignant=new enseignant($db_obj);

$matiere=new matiere($db_obj);
$filiere=new filiere($db_obj);

$specialite=new specialite($db_obj);

$action=$_POST['action'];
$el=$_POST['element'];
$id=$_POST['id'];


if($action=="delete" && $el=="salle"){
    $statu=$salle->delete($id);
}

if($action=="delete" && $el=="enseignant"){
    $statu=$enseignant->delete($id);
}

if($action=="delete" && $el=="filiere"){
    $statu=$filiere->delete($id);
}

if($action=="delete" && $el=="matiere"){
    $statu=$matiere->delete($id);
}

if($action=="delete" && $el=="specialite"){
    $statu=$specialite->delete($id);
}

//Update

if($action=="update" && $el=="salle"){
    $statu=$salle->update($id);
}

if($action=="update" && $el=="enseignant"){
    $statu=$enseignant->update($id);
}

if($action=="update" && $el=="filiere"){
    $statu=$filiere->update($id);
}

if($action=="update" && $el=="matiere"){
    $statu=$matiere->update($id);
}

if($action=="update" && $el=="specialite"){
    $statu=$specialite->delete($id);
}


//echo $statu;
























?>