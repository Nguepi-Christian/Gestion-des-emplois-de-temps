<?php ?>

<!DOCTYPE html>
<html>
<head>
	<title>TimeTable</title>
	<meta charset="utf-8" >
	<link rel="stylesheet" href="css/style.css">
	<style>
		.title{
			height:50px;
			width:80%;
			border :solid 1px black;
			margin:auto;
			margin-bottom:15px;
			padding :10px;
		}

		#en_tete{
			width: 40%;
			border-collapse: collapse;
			margin: auto;
		}

		#main{
			width: 85%;
			border-collapse: collapse;
			margin: auto;
			
		}

		tr,th,td{
			border:solid 1px rgb(2, 2, 2); 
			padding:3px;
			
		}

		select{
			width: 100%;
		}

		.filiere,.specialite{
			width: 15%;
		}

		.niveau,.semestre{
			width: 10%;
		}

	</style>
</head>	
<body>

		<div class="title">
			<center><font size="12">Mode Graphique </font></center><br>
		</div>
		
		<?php 	
			require('connection.php');
			require('timetable.php');
			require('enseignant.php');
			require('salle.php');
			require('matiere.php');

			$connexion=new connection();            
			$database=$connexion->getconnection();  
			//enseignant
			$enseignant=new enseignant($database);
            $result_of_reading=$enseignant->read();
			//salle
			$salle=new salle($database);
          	$result_of_reading_salle=$salle->read();
			//cours
			$cours=new matiere($database);
          	$result_of_reading_cours=$cours->read();

			//echo $semestre=$_POST['semestre'];
		echo '
			<table id="en_tete">
				<tr>
					<td>Niveau</td>
					<td id="niveau"> '.$niveau=$_POST['niveau'].'</td>
				</tr>
				<tr>
					<td>Filiere</td>
					<td id="filiere">'.$filiere=$_POST['filiere'].'</td>
				</tr>
				<tr>
					<td>Specialite</td>
					<td id="specialite">'.$specialite=$_POST['specialite'].'</td>
				</tr>
				<tr>
					<td>Semestre</td>
					<td id="semestre">'.$semestre=$_POST['semestre'].'</td>
				</tr>
			</table><p><br></p>';

		
echo'
		<table id="main">
			<thead>

				<tr>
					<th>Heure/Jour</th>
					<th id="lundi">Lundi</th>
					<th id="mardi">Mardi</th>
					<th id="mercredi">Mercredi</th>
					<th id="jeudi">Jeudi</th>
					<th id="vendredi">Vendredi</th>
					<th id="samedi">Samedi</th>
					<th id="dimanche">Dimanche</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>7h-9h55</td>
					<td id="10_lundi" >
						<select name="">
						<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code_lun_7">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle" name="salle_lun_7">
						<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="10_mardi" >
						<select name="">
						';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="10_mercredi" >
						<select name="">
						<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="10_jeudi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="10_vendredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'					
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '				
						</select>
						<br>
						<select class="salle">
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '							
						</select>
					</td>
					<td id="10_samedi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'							
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '							
						</select>
						<br>
						<select class="salle">
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '							
						</select>
					</td>
					<td id="10_dimanche" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
				</tr>


				<tr>
					<td><b>Pause<b></td>
				</tr>

				<tr>
					<td>10h05-12h05</td>
					<td id="13_lundi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="13_mardi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="13_mercredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="13_jeudi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="13_vendredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'					
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '				
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '							
						</select>
					</td>
					<td id="13_samedi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'							
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '							
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '							
						</select>
					</td>
					<td id="13_dimanche" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
				</tr>


				<tr>
					<td><b>Pause<b></td>
				</tr>


				<tr>
					<td>13h05-15h55</td>
					<td id="16_lundi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="16_mardi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="16_mercredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="16_jeudi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="16_vendredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'					
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '				
						</select>
						<br>
						<select class="salle">
								
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '						
						</select>
					</td>
					<td id="16_samedi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'							
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '							
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '							
						</select>
					</td>
					<td id="16_dimanche" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
				</tr>

				<tr>
					<td><b><b>Pause<b><b></td>
				</tr>


				<tr>
					<td>16h05-18h55</td>
					<td id="19_lundi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="19_mardi" >
						<select name="">
							';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="19_mercredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="19_jeudi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="19_vendredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'					
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '				
						</select>
						<br>
						<select class="salle">
								
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '						
						</select>
					</td>
					<td id="19_samedi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'							
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '							
						</select>
						<br>
						<select class="salle"><option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
				 echo '									
						</select>
					</td>
					<td id="19_dimanche" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
				</tr>
				
				<tr>
					<td><b><b>Pause<b><b></td>
				</tr>

				<tr>
					<td>19h05-21h55</td>
					<td id="21_lundi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
							
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="21_mardi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="21_mercredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="21_jeudi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
					<td id="21_vendredi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'					
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '				
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '							
						</select>
					</td>
					<td id="21_samedi" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'							
						</select>
						<br>
						<select name="code">
							<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value='.$cours->getcodeue().'>'.$cours->getmatiere().'</option>';
			  				}
					echo '							
						</select>
						<br>
						<select class="salle">
								
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '						
						</select>
					</td>
					<td id="21_dimanche" >
						<select name="">
							<option value="responsable">responsable</option>';
						foreach ($result_of_reading as $enseignant) {
							echo 
							  '<option value='.$enseignant->getmatricule().'>'.$enseignant->getprenom().'</option>';
						}
						echo'
						</select>
						<br>
						<select name="code">
						<option value="matiere">matiere</option>';
							 foreach ($result_of_reading_cours as $cours) {
								echo 
								'<option value="'.$cours->getcodeue().'">'.$cours->getmatiere().'</option>';
			  				}
					echo '
						</select>
						<br>
						<select class="salle">
							
							<option value="salle">salle</option>';
						foreach ($result_of_reading_salle as $salle) {
							
							echo '<option value='.$salle->getnom().'>'.$salle->getnom().'</option>';			
						  }
						  echo '
						</select>
					</td>
				</tr>
	
			</tbody>
		  
		</table>
	';
?>
<center><button><p id="tobuy">Verifier</p></button><button id="save">Enregistrer</button></center>
</body>
	<script src="jquery.js"></script>      <!-- Chargement de Jquery  -->	
	<script src="ajax.js"></script>
	<script src="others/sweet/sweetalert2.all.js"></script>
	<script>
			//setInterval('check_avery_time()',1000);	
		$('#tobuy').click(function(){
								//getelement_to_check();
								//check();
								//changecolor();
								check_avery_time();
						        //alert("per");	
								
		});
		insert();
	</script>


<script src="bootstrap/dist/js/bootstrap.min.js" ></script>
<script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	


</html>
