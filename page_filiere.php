<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="others/DataTables/datatables.css">

    <style>
        table{
            border-collapse: collapse;
            width: 75%;
            margin: auto;
            text-align:center;
        }

        th,td,tr{
           border :solid 1px black;
        }
    </style>
</head>
<body>

<div style="margin: auto;text-align: center; background-color:#e5e5e5">
      <font size="10"> Gestion des Filieres</font>  <br>
  </div>
    <br>
    <p align="center">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter une filiere</button>
    </p>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une filiere</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
  
      <form action="add_filiere.php" method="post">
      <table>
        <tr>
            <td><label>Filieres :  </label></td>
            <td> <input type="text" name="filiere" required id=""></td>
        </tr>
      </table>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <input type="submit" value="Ajouter" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

  <br>

  <!-- Modal -->
<div class="modal fade" id="ModalLabel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update une filiere</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
  
      <form action="updatefiliere.php" method="post">
      <table>
        <tr>
            <td><label>Ancienne Filiere :  </label></td>
            <td> <input type="text" name="ffiliere" required id=""></td>
        </tr>
        <tr>
            <td><label> Nouvelle Filiere :  </label></td>
            <td> <input type="text" name="nfiliere" required id=""></td>
        </tr>
      </table>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <input type="submit" value="update" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>


  <center>Liste des Filieres</center> <br>          

  <table id="table">
    <thead>
      <tr>
          <th>Specialite</th>
          <th>delete</th>
          <th>update</th>

      </tr>
    </thead>
      <tbody>

      <?php 
          require('connection.php');
          require('filiere.php');

          $con=new connection();
          $db_obj=$con->getconnection();

          $filiere=new filiere($db_obj);

          $result_of_reading=$filiere->read();

          foreach ($result_of_reading as $filiere) {
              echo 
              '<tr>
                <td>'.$filiere->getfiliere().'</td>
                <td><button class="btn btn-primary" name="'.$filiere->getfiliere().'" value="filiere" onclick="remove(this.name,this.value)">Delete</button></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalLabel">Update</button></td>
              </tr>';
          }
    ?>
       
       </tbody>
  </table>

    
</body>
<script src="action.js"></script>
<script src="others/sweet/sweetalert2.all.js"></script>
<script src="jquery.js"></script>
<script type="text/javascript" src="others/sweet/sweetalert2.all.js"></script>
<script src="others/DataTables/datatables.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js" ></script>
<script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="others/data.js"></script>
</html>                                                                                                                                                                                                                                                                                                                                    