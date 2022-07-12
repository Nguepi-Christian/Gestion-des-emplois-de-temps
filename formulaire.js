

var reponse=new Boolean();
/*
function check_element() {
    jour=document.getElementById("jour").value;
    heure=document.getElementById("heure").value;
    salle=document.getElementById("salle").value;
    check(jour,heure,salle);
}

function check(jour,heure,salle) {
    $.ajax({
        type: 'POST',
        url: '../controller.php',
        data: "salle="+salle+"&heure="+heure+"&jour="+jour,
        success: function(reponse) {
                            if(reponse=="true"){
                               console.log("La réponse est : " + reponse );
                               reponse=false;
                            }else{
                            console.log("OK");  
                               reponse=true;     
                            }                 
       },
        error:function() {
            console.log("Connect error");
        }
    });
}
*/
function inserer(){
    var jour=document.getElementById("jour").value;
    var heure=document.getElementById("heure").value;
    var salle=document.getElementById("salle").value;
    var specialite=document.getElementById("specialite").value;
    var niveau=document.getElementById("niveau").value;
    var filiere =document.getElementById("filiere").value;
    var semestre=document.getElementById("semestre").value;
    var codeue=document.getElementById("matiere").value;
    var ensegnant=document.getElementById("enseignant").value;

   
       
    $.ajax({
        type: 'POST',
        url: '../insert_in_timetable.php',
        data: "salle="+salle+"&heure="+heure+"&jour="+jour+"&matiere="+codeue+"&enseignant="+ensegnant
             +"&specialite="+specialite+"&filiere="+filiere+"&niveau="+niveau+"&semestre="+semestre,
        success: function(reponse) {
                            if(reponse=="true"){

                                Swal.fire({
                                    icon:'success',
                                    title:"Elements ajouétés Correctement",
                                    text:" Element(s) ajouté(s)"
                                });	

                            }else{
                                Swal.fire({
                                    icon:'error',
                                    title:"Une salle ou une plage horaire a deja ete programmer ce jours ",
                                    text:"Erreur ..."
                                });
                                    
                            }                  
                },
        error:function() {
            console.log("Connect error");
        }
    });

  }


var button=document.getElementById("send").onclick=()=>{

            inserer();
       
}