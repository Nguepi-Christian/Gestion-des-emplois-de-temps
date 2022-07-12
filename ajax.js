//Conception du Moteur de verication asynchrone grace a ajax utilisant JQuery 
/***************************************************************************/
var status_globale=new Boolean;
var Ajouter=0;
var rien_ajouter=0;

var salle,ensegnant,codeue,heure,jour;
var tab_of_id=['10_lundi','10_mardi','10_mercredi','10_jeudi','10_vendredi','10_samedi','10_dimanche'];

var tab_of_id_2=['13_lundi','13_mardi','13_mercredi','13_jeudi','13_vendredi','13_samedi','13_dimanche'];

var tab_of_id_3=['16_lundi','16_mardi','16_mercredi','16_jeudi','16_vendredi','16_samedi','16_dimanche'];

var tab_of_id_4=['19_lundi','19_mardi','19_mercredi','19_jeudi','19_vendredi','19_samedi','19_dimanche'];

var tab_of_id_5=['21_lundi','21_mardi','21_mercredi','21_jeudi','21_vendredi','21_samedi','21_dimanche'];

var tab_of_jour=['lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche'];

var tab_of_time=['10','13','16','19','21'];





//Fonction permettant de recuperer les elements a envoyer chaque fois
function getelement_to_check(_jour,_id,_time){
	 jour =document.getElementById(_jour).firstChild.nodeValue; 
	 jour= jour.toLowerCase() //Recuperation du jour
	 cellule_horraire=document.getElementById(_id);  			//le patent et la plage
	 ensegnant = cellule_horraire.childNodes[1].value;
	 codeue = cellule_horraire.childNodes[5].value;
	 salle = cellule_horraire.childNodes[9].value;
	 heure=_time;
}


/*Fonction de verification*/
function check(_jour,_id,_time) {
	
	getelement_to_check(_jour,_id,_time);

	//alert("Start check ...");
	$.ajax({
 			type: 'POST',
 			url: 'controller.php',
 			data: "salle="+salle+"&heure="+heure+"&jour="+jour,
 			success: function(reponse) {
								 if(reponse=="true"){
									alert("La réponse est : " + reponse );
									changecolor(_id);
								 }else{
									resetcolor(_id);
								 }
								 
			},
 			error:function() {
 				console.log("Connect error");
 			}

 	});
 	//alert("End checking ...");
}

//fonction pour changer la couleurlorsqu'il ya Erreur 
function changecolor(_id){
	status_globale=false;
	$("#"+_id).attr('style','background-color: red;');
	
}
//fonction pour changer la couleurlorsqu'il n'ya Erreur 
function resetcolor(_id){
	status_globale=true;
	$("#"+_id).attr('style','background-color:green;');
	
}

//realisation de la boucle de verification
function check_avery_time() {
	//alert("Status "+status_globale);
	for (var i = 0; i < 7; i++) {
		var j=tab_of_jour[i];
		var id=tab_of_id[i];
		var time=tab_of_time[i];
		check(j,id,10);
	}

	for (var i = 0; i < 7; i++) {
		var j=tab_of_jour[i];
		var id=tab_of_id_2[i];
		var time=tab_of_time[i];
		check(j,id,13);
	}


	for (var i = 0; i < 7; i++) {
		var j=tab_of_jour[i];
		var id=tab_of_id_3[i];
		var time=tab_of_time[i];
		check(j,id,16);
	}

	for (var i = 0; i < 7; i++) {
		var j=tab_of_jour[i];
		var id=tab_of_id_4[i];
		var time=tab_of_time[i];
		check(j,id,19);
	}

	for (var i = 0; i < 7; i++) {
		var j=tab_of_jour[i];
		var id=tab_of_id_5[i];
		var time=tab_of_time[i];
		check(j,id,21);
	}

	//t();
	
	
}

//
function insert(){

	var specialite=document.getElementById("specialite").firstChild.nodeValue;
	var niveau=document.getElementById("niveau").firstChild.nodeValue;
	var filiere =document.getElementById("filiere").firstChild.nodeValue;
	var semestre=document.getElementById("semestre").firstChild.nodeValue;

	//console.log(specialite+" "+niveau+" "+filiere+" "+semestre);

	document.getElementById("save").onclick=function() {

	var con=confirm("Vous Etes sur le point d'enregistrer. Toute modification sera impossible");

	console.log('status globale is here ' +status_globale);
		if(status_globale==true && con){
				//on ajoute dans le php
			console.log("l'insertion vas commencer");
			//insert_values();
			for (var i = 0; i < 7; i++) {
				var jour=tab_of_jour[i];
				var id=tab_of_id[i];
				var time=tab_of_time[i];
				
				insert_values(jour,id,10,specialite,filiere,niveau,semestre);
			}
			for (var i = 0; i < 7; i++) {
				var jour=tab_of_jour[i];
				var id=tab_of_id_2[i];
				var time=tab_of_time[i];
				
				insert_values(jour,id,13,specialite,filiere,niveau,semestre);
			}
			for (var i = 0; i < 7; i++) {
				var jour=tab_of_jour[i];
				var id=tab_of_id_3[i];
				var time=tab_of_time[i];
				
				insert_values(jour,id,16,specialite,filiere,niveau,semestre);
			}
			for (var i = 0; i < 7; i++) {
				var jour=tab_of_jour[i];
				var id=tab_of_id_4[i];
				var time=tab_of_time[i];
				
				insert_values(jour,id,19,specialite,filiere,niveau,semestre);
			}
			for (var i = 0; i < 7; i++) {
				var jour=tab_of_jour[i];
				var id=tab_of_id_5[i];
				var time=tab_of_time[i];
				
				insert_values(jour,id,21,specialite,filiere,niveau,semestre);
			}
			console.log("terminer");

			if(Ajouter==0){
				Swal.fire({
					icon:'error',
					title:"Rien a ete ajouté",
					text:"Vous n'evez rien planifier"
				});	
			}

			if(Ajouter>0){
				Swal.fire({
					icon:'success',
					title:"Elements ajouétés Correctement",
					text:Ajouter+ " element(s) ajouté(s)"
				});	
			}
		}
		else{
			if(status_globale==false){
				console.log("L'etat n'as pas ete verifier");
				Swal.fire({
					icon:'error',
					title:"Aucune verication effectuee",
					text:'Oops...Appuyez sur verifier'
				});	
			}
			
		}


	}
	
	
}


//requete asynchrone pour lancer l'insertion
function insert_values(_jour,_id,_time,specialite,filiere,niveau,semestre){

	 jour =document.getElementById(_jour).firstChild.nodeValue; 
	 jour= jour.toLowerCase(); 									
	 cellule_horraire=document.getElementById(_id);  			
	 ensegnant = cellule_horraire.childNodes[1].value;
	 codeue = cellule_horraire.childNodes[5].value;
	 salle = cellule_horraire.childNodes[9].value;
	 heure=_time;

	 //alert(codeue+' ');

	if(salle=="salle" || ensegnant=="responsable"  || codeue=="matiere"){
		rien_ajouter++;
		console.log("rien a ajouter" +rien_ajouter);
	}else{
		Ajouter++;
		console.log("Debut inserttion" +Ajouter);
			$.ajax({
				type: 'POST',
				url: 'insert_in_timetable.php',
				data: "salle="+salle+"&heure="+heure+"&jour="+jour+"&matiere="+codeue+"&enseignant="+ensegnant
					 +"&specialite="+specialite+"&filiere="+filiere+"&niveau="+niveau+"&semestre="+semestre,
				success: function(reponse) {
									if(reponse=="true"){
											console.log("l'insertion s'est bien derouler");			
									}else{
											console.log("l'insertion ne s'est pas bien derouler "+reponse);
									}
									
						},
				error:function() {
					console.log("Connect error");
				}
			});

		console.log("fin inserttion"+Ajouter);
	}	
	
}

 
 function get_values_to_insert(_jour,_id,_time){

	 jour =document.getElementById(_jour).firstChild.nodeValue; 
	 jour= jour.toLowerCase() 									
	 cellule_horraire=document.getElementById(_id);  			
	 ensegnant = cellule_horraire.childNodes[1].value;
	 codeue = cellule_horraire.childNodes[5].value;
	 salle = cellule_horraire.childNodes[9].value;
	 heure=_time;

}
 


