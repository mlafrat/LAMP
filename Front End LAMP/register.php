<?php
session_start();
	require_once('includes/functions.inc.php');
	debug_to_console("Test");
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		$query = "INSERT INTO Users (firstName, lastName, userName, password) Values ('$firstName','$lastName','$userName','$password')";
		$conn = connectToDatabase();
    mysqli_query($conn, $query);
		header("Location: login.php");
    if(!$conn){die("Failed to connect to db!".mysqli_connect_error());}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <script type="text/javascript" src="js/code.js"></script>
    <link rel="stylesheet" href="/css/login.css" />
    <link rel="stylesheet" href="globals.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Ubuntu"
    />
  </head>
  <body>
    <div class="containerWrapper">
      <div class="container">
        <div class="backBox"></div>
        <div class="frontBox"></div>
        <div class="registerTitle">Sign Up</div>
        <div class="signUpBelow">New User? Sign up below!</div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <input type="text" class="boxOne" placeholder="First Name" id="firstName"required />
          <br />
          <input type="text" class="boxTwo" placeholder="Last Name" id="lastName"required />
          <br />
          <input type="text" class="boxThree" placeholder="Username" id="userName"required />
          <br />
          <input type="password" class="boxFour" placeholder="Password" id="password"required/>
          <br />
          <input type="submit" class="signUpButton" value="Register" />
        </form>
        <div class="retUserText">Existing user? Sign in below!</div>
        <a href="login.php">
          <button class="signInButton">Login</button>
        </a>
      </div>
    </div>
  </body>
</html>
