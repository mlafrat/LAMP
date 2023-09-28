<?php
session_start();
	require_once('includes/functions.inc.php');
	debug_to_console("Test");
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = connectToDatabase();
		debug_to_console("User auth start");
		$user = authenticate_user($username, $password);
		debug_to_console("User auth end");
		
		if ($user) 
		{
			// Store user data in the session for later use
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['username'] = $user['userName'];
			// Redirect to a logged-in user page
			header("Location: contacts.php");
			exit();
		} else 
		{
			debug_to_console("Else happened");
			$error_message = "Invalid username or password";
		}
	}
?>

<!DOCTYPE html>
<head>
  <title>POOSD LSP08 Login</title>
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
      <div class="loginTxt">Sign In</div>
      <p class="existUserText">Existing user? Sign into your account!</p>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" class="boxOne" placeholder="Username" id="username" required />
        <br />
        <input type="password" class="boxTwo" placeholder="Password" id="password" required />
        <br />
        <input type="submit" class="loginButton" value="Login" />
      </form>
      <div class="newUserText">New User? Register below!</div>
      <a href="register.php">
        <button class="registerButton">Register</button>
      </a>
    </div>
  </div>
</body>
