<?php
  
  

   $age = 19;

   if ($age >= 18){
      echo "You may enter this site";
   }
   
   elseif($age ==0){
     echo "You were just born";
   }

   else {
     echo "You must be 18+ to enter";
   }
     
 
    
    
    $adult = false;
    
    if($adult == true){
      echo "You may enter this site";
    } 

    else{
      echo "You may be an adult to enter";
    }
   

   $hours = 40;
   $rate = 15;
   $weekly_pay = null;

   if($hours <= 40){
      $weekly_pay = $hours * $rate;
   }

   echo "You made \${$weekly_pay} this week";

?>