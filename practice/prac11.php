<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edi</title>
</head>
<body>
  <form action="index.php" method="post">
    <label>Enter a Country</label><br>
    <input type="text" name="country"><br>
    <input type="submit">
  </form>
</body>
</html>

<?php
     
   $capitals = array("USA"=>"Washington D.C",
                   "Japan"=>"Kyoto", 
                   "South korea"=>"Seoul", 
                   "Philippines"=>"Manila");

    $capital = $capitals [$_POST["country"]];        
    
    echo "The capital is {$capital}";

   /*
   //$capitals ["USA"] = "Palawan";               
   //$capitals ["China"] ="Beijing"; 

   //array_pop($capitals);
   //array_shift($capitals);         
  
  // echo $capitals["Philippines"];                
  
   foreach($capitals as $key => $value){
     echo"{$key} = {$value} <br>";
   }
  */
?>
