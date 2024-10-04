<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database</title>
</head>
  <body>
   <form action="prac3.php" method="post">
     <label>quantity:</label><br>
     <input type="text" name="quantity">
     <input type="submit" value="total">
   </form>
  </body>
</html>

<?php
   $item = "burger";
   $price = "5";
   $quantity = $_POST["quantity"];
   $total = null;

   $total = $price * $quantity;

   echo"You have ordered {$quantity} x {$item}/s <br>";
   echo"Your total is: \${$total}";
?>