<?php
  $foods = array("orange", "apple", "banana", "coconut");
 
  $foods[2] = "pineapple"; // Replace "banana" with "pineapple"
  array_push($foods, "pakwan",); // Add "pakwan" to the end
  array_pop($foods);  

  // Output each element with a line break
  echo $foods[0] . "<br>";
  echo $foods[1] . "<br>"; 
  echo $foods[2] . "<br>";
  echo $foods[3] . "<br>";
?>
