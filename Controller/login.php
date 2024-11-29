<?php

	//start session
	session_start();

	if(isset($_POST["submit"]))
	{

	//checks the database connection
	$conn = mysqli_connect("localhost","root","","edupulsedb");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	//checks if username and password are matching
	$sql = "SELECT * FROM userdetails WHERE username='$username' AND password='$password'";

	//execution
	$result = mysqli_query($conn, $sql);

	//redirect to main page if user has already login
	if (mysqli_num_rows($result) > 0) {
		$_SESSION['username'] = $username;  
		header('Location: ../Model/main.php');  
		exit;
	} else {
		//if the username or password is incorrect
		echo "<script>alert('Incorrect username or password.')</script>";
		echo "<script>window.history.back()</script>";
   	 	exit();
	}

	//close the database connection
	mysqli_close($conn);

	}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="../View/CSS/main.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://kit.fontawesome.com/eb5924e427.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

        <h2>Login</h2>

        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit" class="btn" id="submit" value="submit" name="submit">LOGIN</button>
        </form>

		<br>

		<p class="link">Don't have an account? &nbsp; &nbsp; <a href="../Controller/signup.php">SIGN UP</a></p>

    </div>

</body>

</html>
