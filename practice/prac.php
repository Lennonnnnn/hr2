<?php
     
     $name = "Lennon";
     $food = "Fries";
     $email = "lennonaguilor14gmail.com";


     echo "Hello {$name}<br>";
     echo "I like {$food}<br>";
     echo "My gmail is {$email}<br>";

     $quantity = 2;
     $price = 10;

     $total = null;

    echo "You have ordered {$quantity} x {$food} <br>";
    $total = $quantity * $price;
    echo "Your total is: \${$total}";
    
      
    
     $x = 10;
     $y = 2;
     $z = null;
          
      $z = $x / $y;
      echo $z;
     
       
      
     $counter = 5;
     
     $counter+=3;
     echo $counter;
      
?>