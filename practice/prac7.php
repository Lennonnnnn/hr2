<?php

 /*
  $grade = "microne";

   switch($grade){
      case "A";
        echo"You did great";
        break;
      case "B";
        echo"You did good";
        break;
      case "C";
        echo"You did Okay";
        break;
      case "D";
        echo"You did poorly";
        break; 
      case "F";
        echo"You Failed";
        break;
      default;
        echo"{$grade} is not valid";                 
   }
 */
 
   $date = date("l");

   
   
   switch ($date){
       case"Monday";
        echo"I hate Monday";
        break;
       case"Tuesday";
        echo"I hate Tuesday";
        break;
       case"Wednesday";
        echo"I hate Wednesday";
        break;
       case"Thursday";
        echo"I hate Thursday";
        break;
       case"Friday";
        echo"I hate Friday";
        break;
       case"Saturday";
        echo"I hate Saturday";
        break;
       default;
        echo "{$date} is not a day";
   }

?>