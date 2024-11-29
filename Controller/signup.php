<?php

    //start session
    session_start();

	if(isset($_POST["submit"]))
	{
		$email = $_POST["email"];
		$username = $_POST["username"];
		$password = $_POST["password"];
        $score = $_POST["score"];
		
        //checks the database connection
		$conn = mysqli_connect("localhost","root","","edupulsedb");
					
			if(!$conn)
			{
				die("Cannot connect to the database server");
			}
		

    //to check if the email address and username already exists in the database
    $sql = "SELECT email, username FROM userdetails WHERE email = '" . $_POST['email'] . "' OR username = '" . $_POST['username'] . "'";

    //execution
    $result = mysqli_query($conn, $sql);

    $emailAlreadyExists = false;
    $usernameAlreadyExists = false;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] === $_POST['email']) {
            $emailAlreadyExists = true;
        }
        if ($row['username'] === $_POST['username']) {
            $usernameAlreadyExists = true;
        }
    }


    //if email address and username already exists in the database
    if ($emailAlreadyExists) {
        echo "<script>alert('This email address is already in use. Please choose a different one.')</script>";
        echo "<script>window.history.back()</script>";
        exit();
    }
    if ($usernameAlreadyExists) {
        echo "<script>alert('This username is already in use. Please choose a different one.')</script>";
        echo "<script>window.history.back()</script>";
        exit();
    }


    //if email address and username do not exist in the database
    $sql = "INSERT INTO userdetails (email, username, password, score) VALUES ('" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $_POST['password'] . "', null)";


    //redirect to login page
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");  
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    //close the database connection
    mysqli_close($conn);

	}
		
?>


<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="../View/CSS/main.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <script src="https://kit.fontawesome.com/eb5924e427.js" crossorigin="anonymous"></script>
    
    <script src="../Controller/validation.js" ></script>
</head>

<body>

    <div class="container">

        <h2>Sign Up</h2>

        <form action="" method="post" onsubmit="return validate(event)">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <button type="submit" class="btn" name="submit" id="submit" value="submit">SIGN UP</button>
        </form>

        <br>
        
        <p class="link">Already have an account? &nbsp; &nbsp; <a href="../Controller/login.php">LOGIN</a></p>
    
    </div>
    
</body>

</html>
