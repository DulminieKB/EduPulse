<?php
//start session
session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <title>Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="stylesheet" href="../View/CSS/start.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://kit.fontawesome.com/eb5924e427.js" crossorigin="anonymous"></script>
  </head>

  <body>
 
    <div class="container">

        <div class="header">
            <h1>EDU PULSE</h1>
        </div>

        <br>  

        <div class="button">
          <a href="../Model/level.php">START</a>
        </div>

        <div class="button">
          <a href="../Model/how.php">HOW TO PLAY</a>
        </div>

        <div class="button">
          <a href="../Model/score.php">SCOREBOARD</a>
        </div>
        
        <div class="button">
          <a href="../Controller/login.php">EXIT</a>
        </div>

    </div>

  </body>

</html>
