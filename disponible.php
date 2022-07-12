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
            width: 80%;
            margin: auto;
            text-align: center;
        }
       
        tr,td{
            border: black 1px solid;
        }

    </style>

<body>
        
    <div>
        <p align="center">
            <font size="5" weight="2">Emplois de temps disponible</font>
        </p>
    </div>
        <br>
    <table id="table" class="table table-striped">
        <thead>
            <tr>
                <td>Filiere</td>
                <td>Specialite</td>
                <td>Niveau</td>
                <td>Semestre</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>

        <?php 	
			require('connection.php');
			require('timetable.php');
		
			$connexion=new connection();            
			$database=$connexion->getconnection();  
			//enseignant
			$timetable=new timetable(null,null,null,null,null,null,null,null,null);
            $timetable->setDB($database);
            $result_of_reading=$timetable->read();
        
            foreach ($result_of_reading as $value) {
            echo'
                <tr>
                    <td>'.$value->getfiliere().'</td>
                    <td>'.$value->getspecialite().'</td>
                    <td>'.$value->getniveau().'</td>
                    <td>'.$value->getsemestre().'</td>
                    <td><a href="voir.php?filiere='.$value->getfiliere().'&specialite='.$value->getspecialite().'&niveau='.$value->getniveau().'&semestre='.$value->getsemestre().'">voir</a></td>
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