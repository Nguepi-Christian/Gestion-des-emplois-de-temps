
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ressources-Enseignant</title>
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
            border:solid 1px black;
        }
      
    </style>
</head>
<body>

<div style="margin: auto;text-align: center; background-color:#e5e5e5">
      <font size="10"> Gestion des Enseignants</font>  <br>
  </div>
    <br>

    <br>
    <p align="center">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un enseignant</button>
    </p>

<!--Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un enseignant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
      <form action="add_ensei.php" method="post">
      <table>
        <tr>
            <td><label>Nom(s) :  </label></td>
            <td> <input type="text" name="nom" required id=""  placeholder="Start typing here..." upercase  onkeyup="Show(this.value)">
            <div id="div">
                Auto-Suggestion
            </div>
        </td>
            
        </tr>
        <tr>
            <td> <label>Prenom(s) : </td>
            <td></label><input type="text" name="prenom" required id=""></td>
        </tr>
        <tr>
            <td><label>Grade : </label></td>
            <td>
                <select name="grade" id="" >
                    <option value="Docteur">Dr</option>
                    <option value="phd">Phd</option>
                </select>
            </td>
        </tr>
        <tr>
        </tr>
      </table>
    <br>
  
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


  <!-- Update -->
<div class="modal fade" id="ModalLabel" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update une salle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
  
      <form action="updateenseign.php" method="post">
      <table>
        <tr>
            <td><label>Ancien Matricule :  </label></td>
            <td> <input type="text" name="fmat" required id=""></td>
        </tr>
        <tr>
            <td><label>Nouveau Matricule :  </label></td>
            <td> <input type="text" name="nmat" required id=""></td>
        </tr>
        <tr>
            <td> <label>Nouveau nom : </td>
            <td></label><input type="text" name="nname"  required id=""></td>
            
        </tr>
        <tr>
            <td><label>Nouveau Prenom :  </label></td>
            <td> <input type="text" name="np" required id=""></td>
        </tr>
        <td><label>Nouveau Grade : </label></td>
            <td>
                <select name="grade" id="" >
                    <option value="Docteur">Dr</option>
                    <option value="phd">Phd</option>
                </select>
            </td>
      </table>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <input type="submit"   value="Mettre a jour" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

  <center>Liste des enseignants</center> <br>          

  <table id="table" class="table table-striped">
      <thead>
        <tr>
            <th>Matricule</th>
            <th>Nom(s)</th>
            <th>Presnom(s)</th>
            <th>grade</th>         
            <th>actions</th>
            <th>Update</th>                                                                        
        </tr>
      </thead>
     <tbody>
      
      <?php 
          require('connection.php');
          require('enseignant.php');

          $con=new connection();
          $db_obj=$con->getconnection();

          $enseignant=new enseignant($db_obj);

          $result_of_reading=$enseignant->read();

          foreach ($result_of_reading as $enseignant) {
              echo 
              '<tr>
                <td>'.$enseignant->getmatricule().'</td>
                <td>'.$enseignant->getname().'</td>
                <td>'.$enseignant->getprenom().'</td>
                <td>'.$enseignant->getgrade().'</td>
                <td><button class="btn btn-primary" name="'.$enseignant->getmatricule().'" value="enseignant" onclick="remove(this.name,this.value)">Delete</button></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalLabel">Update</button></td>
                </tr>';
          }
    ?>
    </tbody>
  </table>





    
</body>
<script type="text/javascript" src="find.js"></script>
<script src="action.js"></script>
<script src="others/sweet/sweetalert2.all.js"></script>
<script src="others/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="others/sweet/sweetalert2.all.js"></script>
<script src="others/DataTables/datatables.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js" ></script>
<script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="others/data.js"></script>
</html>                                                                                                                                                                                                                                                                                                                                    