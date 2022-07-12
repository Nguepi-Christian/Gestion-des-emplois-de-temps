<?php 

  $bdd=new PDO('mysql:host=localhost;dbname=emploidetemps', 'root','');

  $word=$_GET['q'];

    $req=$bdd->prepare('SELECT * FROM enseignant,timetable  WHERE nom LIKE("%"?"%") ');
    $req->execute(array($word));

   
    if($word==""){
    	 echo "aucun resultat...";
    }else{
    	while ($result=$req->fetch()) {
    	 	$match=$result['nom'];
    	 	$match=strtolower($match);
    	 	$ch3=str_replace(''.$word,'<font color="red">'.$word.'</font>',$match);
         
    	 	echo '<option>'.$ch3.'</option>';
    	 }
    }
    
   

 ?>
      