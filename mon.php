<?php
require('connection.php');
require('timetable.php');

$idenseig=$_GET['idenseig'];

$connexion=new connection();            
$database=$connexion->getconnection();

$query=$database->prepare('SELECT nom FROM enseignant WHERE idenseig=?');
$result=$query->execute(array($idenseig));
while($result=$query->fetch()){
     $result['nom'];
    break;
}




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
    
</head>
    <style>
        table{
            border-collapse: collapse;
            
            margin: auto;
            text-align: center;
        }
        tr,td{
            border: black 1px solid;
        }

    </style>

<body>

    <div>
        <center>Emplois de Temps De '.$result['nom'].'</center>
    </div>

    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <td>Jours</td>
                <td>Salle</td>
                <td>Heure</td>
                <td>Matiere</td>
                <td>specialite</td>
                <td>filiere</td>
                <td>semestre</td>
            </tr>
        </thead>

        <tbody>';
?>
        <?php 	
			
		
			  
			//enseignant
			$timetable=new timetable(null,null,null,null,null,null,null,null,null);
            $timetable->setDB($database);
            //Read distinc
           // $result_of_reading_distinct=$timetable->read();
            
            $result_of_reading_all=$timetable->readAll_for($idenseig);


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
                                <td>'.$value->getfiliere().'</td>
                                <td>'.$value->getspecialite().'</td>
                                <td>'.$value->getniveau().'</td>
                            </tr>
                        ';
                    }

        ?>
        </tbody>
    </table>
    
</body>

<script src="others/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="others/sweet/sweetalert2.all.js"></script>
<script src="others/DataTables/datatables.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js" ></script>
<script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="others/data.js"></script>


</html>








