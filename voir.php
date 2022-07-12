<?php

$specialite=$_GET['specialite'];
$filiere=$_GET['filiere'];
$niveau=$_GET['niveau'];
$semestre=$_GET['semestre'];

echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="others/DataTables/datatables.css">
    <script src="print/html2pdf.bundle.min.js"></script>
    <script src="print/To_PDF.js"></script>
</head>
    <style>
    table{
        border-collapse: collapse;
        width: 80%;
        margin: auto;
        text-align: center;
    }

    </style>

<body>

<br>
<div id="">
    <div>
        <p align="center">
            
        </p>
    </div>

    
    <table id="table" class="table table-striped">
        <p align="center">
            <font size="5" weight="2">Emplois de temps </font><br>
        </p>
        <thead>
            <tr>
                <td>Jours</td>
                <td>Salle</td>
                <td>Heure</td>
                <td>Matiere</td>
                <td>Enseignant</td>
                <td>Update</td>
            </tr>
        </thead>

        <tbody>';
?>
        <?php 	
			require('connection.php');
			require('timetable.php');
		
			$connexion=new connection();            
			$database=$connexion->getconnection();  
			//enseignant
			$timetable=new timetable(null,null,null,null,null,null,null,null,null);
            $timetable->setDB($database);
            $result_of_reading_all=$timetable->readAll_Where($specialite,$filiere,$niveau,$semestre);
        
            foreach ($result_of_reading_all as $value) {
            echo'
                <tr>
                    <td>'.$value->getjours().'</td>
                    <td>'.$value->getsalle().'</td>';
                    if($value->getheure()=="10"){
                        echo '<td>7h00-9h55</td>';
                    }
                    if($value->getheure()=="13"){
                        echo '<td>10h05-12h55</td>';
                    }
                    if($value->getheure()=="16"){
                        echo '<td>13h05-15h55</td>';
                    }
                    if($value->getheure()=="19"){
                        echo '<td>16h05-18h55</td>';
                    }
                    if($value->getheure()=="21"){
                        echo '<td>19h05-21h55</td>';
                    }
                    echo '
                    <td>'.$value->getcours().'</td>
                    <td>'.$value->getenseignant().'</td>
                    <td><a href="FormAdd/updatetime.php?filiere='.$filiere.'&specialite='.$specialite.'&niveau='.$niveau.'&semestre='.$semestre.'&heure='.$value->getheure().'&jour='.$value->getjours().'&salle='.$value->getsalle().'&enseignant='.$value->getenseignant().'&matiere='.$value->getcours().'">Update</a></td>
                </tr>
              ';
            }
            
        ?>
        </tbody>
    </table><br>
</body>
<center><button onclick="convert()" class="btn btn-primary">Download Here</button></center>
<script src="others/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="others/sweet/sweetalert2.all.js"></script>
<script src="others/DataTables/datatables.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js" ></script>
<script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="others/data.js"></script>

</html>








