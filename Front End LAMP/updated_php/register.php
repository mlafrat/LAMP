<?php
session_start();
	require_once('includes/functions.inc.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
    $_SESSION['error'] = 0;

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		
		$conn = connectToDatabase();
    if(!$conn){die("Failed to connect to db!".mysqli_connect_error());}
    
    $register = register_user($firstName,$lastName,$userName,$password);
    switch($register)
    {
      case 2:
        $_SESSION['error'] = 2;
        header("Location: register.php");
        exit();
        break;
      case 3:
        $_SESSION['error'] = 3;
        header("Location: register.php");
        exit();
        break;
    }

    header("Location: login.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <script type="text/javascript" src="js/code.js"></script>
    <link rel="stylesheet" href="/css/register.css" />
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
          <input type="text" class="boxOne" placeholder="First Name" name="firstName"required />
          <br />
          <input type="text" class="boxTwo" placeholder="Last Name" name="lastName"required />
          <br />
          <input type="text" class="boxThree" placeholder="Username" name="userName"required />
          <br />
          <input type="password" class="boxFour" placeholder="Password" name="password"required/>
          <br />
          
          <?php
          if ($_SESSION['error'] == 2)
          {
          echo "<div class='errorRegister'>Username is either taken or does not fit the requirements.</div>";
          }
          if ($_SESSION['error'] == 3)
          {
          echo "<div class='errorRegister'>Password does not fit the requirements.</div>";
          }
        ?>
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
