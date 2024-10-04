<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
       <label>Enter a number to count:</label>
       <input type="text" name="counter">
       <input type="submit" value="start">
    </form>
</body>
</html>


<?php
  
   $counter = $_POST["counter"];
     
      for($i = 1; $i <= $counter; $i++){
        echo $i ."<br>";
      }
  
  
  
  /*
   for ($i = 20;$i <= 100; $i++){ 
     echo $i. "<br>";
   }
  */
?>