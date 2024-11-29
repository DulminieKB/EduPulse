<?php

	//start session
	session_start();

	//checks the database connection
	$conn = mysqli_connect("localhost","root","","edupulsedb");

	if (!$conn) {
		die("Error: " . mysqli_connect_error());
	}

	//find the username and score from the database
	$sql = "SELECT username, score FROM userdetails ORDER BY score DESC";
	$result = mysqli_query($conn, $sql);

	//check for returned rows
	if (mysqli_num_rows($result) > 0) {
	//array to store data
	$rows = array();
	//display the looped rows in the table
	while ($row = mysqli_fetch_assoc($result)) {
	$rows[]=$row;
	}
	} 
	else {
		 echo "<tr><td colspan='2'>No results.</td></tr>";
		}
 
?>


<!DOCTYPE html>
<html>

<head>
    <title>Scoreboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="stylesheet" href="../View/CSS/how.css">
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://kit.fontawesome.com/eb5924e427.js" crossorigin="anonymous"></script>
</head>

<body>

    <h1 id="title">EDU PULSE <span id="title"></h1>

	<h2>Scoreboard</h2>
	
	<table>
		<thead>
			<tr>
				<th>Name of the Player</th>
				<th>Score</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<th>dulll</th>
				<th>1000</th>
			</tr>
			<tr>
				<th>duli</th>
				<th>1000</th>
			</tr>
		</tbody>
	</table>

	</div>

    <div class="button2" onclick="window.location.href='main.php'">
    <a href="../Model/main.php">BACK</a>
    </div>

</body>

</html>
