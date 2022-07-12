<?php 

    class Random{

       public function Generate(){
        
            $randomId="";
            $tab_letters=["M","D","C","K"];
            $tab_number=[1,2,3,4,5,6,7,8,9,0];
       
    
        for ($i=0; $i < 2; $i++) { 
            $randomId.=$tab_number[random_int(0,9)];
        }

        for ($i=0; $i < 2; $i++) { 
            $randomId.=$tab_letters[random_int(0,3)];
        }
        for ($i=0; $i < 2; $i++) { 
            $randomId.=$tab_number[random_int(0,9)];
        }
      
        return $randomId;
       }


    }

?>