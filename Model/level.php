<?php
//start session
session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Levels</title>
    <link rel="stylesheet" href="../View/CSS/start.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://kit.fontawesome.com/eb5924e427.js" crossorigin="anonymous"></script>
  </head>

  <body>

    <div class="container">
      
        <div class="header">
            <h1>EDU PULSE</h1>
        </div>

      <div class="button" onclick="window.location.href='easy.php'">
        <a href="../Model/easy.php">EASY</a>
      </div>
      
      <div class="button" onclick="window.location.href='medium.php'">
        <a href="../Model/medium.php">MEDIUM</a>
      </div>

      <div class="button" onclick="window.location.href='hard.php'">
        <a href="../Model/hard.php">HARD</a>
      </div>

      <div class="button" onclick="window.location.href='main.php'">
        <a href="../Model/main.php">BACK</a>
      </div>

    </div>
    
  </body>

</html>
