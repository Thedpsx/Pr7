<?php
   filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       .container {
           width: 400px;
       }
       .invalid-msg{
          color: red;
       }
   </style>
</head>
<body style="padding-top: 3rem;">
 
<div class="container">
   <?php
   echo "<div class='invalid-msg'>";
      require 'uploads.php';
   echo "</div>";
   if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["gender"])){
      echo "<span class='invalid-msg'>Invalid Data<span>";
   }else{

      $name = $_POST["name"];
      $email = $_POST["email"];
      $gender = $_POST["gender"];

      echo "<br>User Added ".$name."<br>";
      echo "Email ".$email."<br>";
      echo "Gender ".$gender."<br>";
      echo "Filepath ".$filePath."<bt>";

      if (!file_exists('database/users.csv')) {
         file_put_contents('database/users.csv', '');
      }
      
      $fp = fopen('database/users.csv', 'a');
      fwrite($fp, "$name,$email,$gender,$filePath\n");
      fclose($fp);
   }?>
   <hr>
   <a class="btn" href="adduser.php">return back</a>
   <a class="btn" href="table.php">view list</a>
</div>
</body>
</html>
