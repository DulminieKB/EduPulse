<?php

  //start session
  session_start();

  //checks the database connection
	$conn = mysqli_connect("localhost","root","","edupulsedb");

	if (!$conn) {
		die("Error: " . mysqli_connect_error());
	}

  //retrieve username 
  $username = $_SESSION['username'];

  //calculate score
  $score = 0;
  $input ="";
  $solution ="";

  if ($input == $solution) {
    $score += 1000; //multiply by 1000 if the answer is correct 
  }
  if ($input != $solution) {
      $score -= 100; //reduce by 100 if the answer is incorrect
  }

  //update the score in the database
  $sql = "UPDATE userdetails SET score = '$score' WHERE username = '$username'";

  if ($conn->query($sql) === TRUE) {
    
  } else {
    echo "Error updating the score: " . $conn->error;
  }

  //close the database connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

<head>
  <title>Easy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="stylesheet" href="../View/CSS/gamenew.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <script src="https://kit.fontawesome.com/eb5924e427.js" crossorigin="anonymous"></script>
</head>

<body>

  <h1 id="title">EDU PULSE <span id="title"></h1>
  <h3>EASY</h3>

  <div class="topBox" >
    <h2 id="question-number-title" style="color: white;">Question <span id="questionnumber">1</span>/10</h2>
    <h2 id="score-title" style="color: white;">Current Score: <span id="score">0</span></h2>

  <div class="lowBox" style="display: flex; justify-content: end;">
    <h2 id="time-left-title" style="color: white;">Time remaining:  <span id="timer">60 seconds</span></h2>
  </div>

  </div>
  

  <script>

    //calculate the time
    let timeLeft = 60;
    let score = 0;
    let timer = setInterval(() => {
      timeLeft--;
      document.getElementById("timer").textContent = timeLeft;
      if (timeLeft <= 0) {
        clearInterval(timer);
        alert("Time's up!");
      }
    }, 1000);

    let Question = "";
    let solution = -1;
    let numofQuestions = 0;
    let ansIncorrect = 0;

    function newGame() {
      startup();
    }


    //check answer for enter
    function handleInput() {
      let input = document.getElementById("answer");
      let message = document.getElementById("message");
     
      if (input.value == solution) {
		    score += 1000;
        document.getElementById("score").textContent = score;
        
        //increase question number
        numofQuestions++;
        //update question number
        document.getElementById("questionnumber").textContent = numofQuestions; 

        //assign 10 questions
        if (numofQuestions >= 10) {
          clearInterval(timer);
          alert("Awesome!!! Level Completed!");
          return;
        }

        //wait 1 second before moving to next question
        setTimeout(newGame, 1000); 

        //indicate message for correct answer
        message.innerHTML = 'Congratulations, Keep going!';
        message.style.color = 'white';
        } 
        else {
        ansIncorrect++;
      
        //if 5 incorrect answers are given, start from begining
        if (ansIncorrect >= 5) { 
        clearInterval(timer);
        alert("Too many incorrect attempts. Start again.");
        location.reload();
        return;
      }

        //for an incorrect answer, decrease the score by 100 and update the scoreboard
        if(score>=100)
		    score -= 100;
        //indicate message for incorrect answer
        document.getElementById("score").textContent = score;
        message.innerHTML = "Incorrect answer, You lost!";
        message.style.color = 'white';
    }

        //clear the input field after each try
        input.value = "";
    }

    async function TomatoQuestion(data) {
      //to reset the timer
      clearInterval(timer);
      timeLeft = 60;
      timer = setInterval(() => {
        timeLeft--;
        document.getElementById("timer").textContent = timeLeft;
        if (timeLeft <= 0) {
          clearInterval(timer);
          handleTimeOut();       
        }
      }, 1000);

    function handleTimeOut() {
      //increase question number
      numofQuestions++;
      //update question number
      document.getElementById("questionnumber").textContent = numofQuestions; 
      
      if (numofQuestions >= 10) {
        //game over if no more questions left
        clearInterval(timer);
        alert("Congratulations! You are a Pulser.");
      } 
      else {
        //if not, move to next question
        alert("Time's up! Moving on to the next question.");
        //wait 1 second before moving to next question
        setTimeout(newGame, 1000); 
      }
    }

        //update the question and the answer
        Question = data.question;
        solution = data.solution;

        let img = document.getElementById("questioning");
        img.src = data.question;

        let message = document.getElementById("message");
        message.innerHTML = "";
      }

        //fetch data from api
        async function fetchText() {
          let response = await fetch('https://marcconrad.com/uob/tomato/api.php');
          let data = await response.json();
          TomatoQuestion(data);
        }

        function startup() {
          fetchText();
        }

        startup();

    </script>


<div class="answercheck" align="center">
  <div>
    <p id="question"></p>
    <img id="questioning" src="" alt="Question Image">
    <label for="quantity"><h2 style="color: white;">Enter the missing digit</h2></label>
    <input class="button" type="number" id="answer" name="answer" min="0" max="9" onkeydown="if (event.keyCode === 13) handleInput();">
    <input class="button" name="btnSubmit" type="submit" class="btn" id="btnSubmit" value="Check" onClick="handleInput()"/>
	  <button class="button" type="exit" onclick="window.location.href='level.php'" >Exit</button>
    <div id="message"></div>
  </div>

</div>
	
</body>

</html>
