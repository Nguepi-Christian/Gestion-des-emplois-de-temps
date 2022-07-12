function remove(id,el){

    $.ajax({
        type:'POST',
        url:'crud.php',
        data: "id="+id+"&element="+el+"&action="+"delete",
        success: function(reponse) {
                            if(reponse=="true"){
                               alert("La réponse est : " + reponse );
                              
                            }else{
                                alert("else réponse est : " + reponse );
                                window.location.reload();
                            }
                            
       },
        error:function() {
            console.log("Connect error");
        }
    });

}


function update(id,el){
    $.ajax({
        type: 'POST',
        url: 'crud.php',
        data: "id="+id+"&element="+el+"&action="+"update",
        success: function(reponse) {
                            if(reponse=="true"){
                               alert("La réponse est : " + reponse );
                              
                            }else{
                               //alert("ghfh");
                               window.location.reload();
                            }
                            
       },
        error:function() {
            console.log("Connect error");
        }
    });
    
}
