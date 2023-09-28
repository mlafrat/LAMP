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
        <form action="placeholder.php" method="POST">
          <input type="text" class="boxOne" placeholder="First Name" required />
          <br />
          <input type="text" class="boxTwo" placeholder="Last Name" required />
          <br />
          <input type="text" class="boxThree" placeholder="Username" required />
          <br />
          <input
            type="password"
            class="boxFour"
            placeholder="Password"
            required
          />
          <br />
          <input type="submit" class="signUpButton" value="Register" />
        </form>
        <div class="retUserText">Existing user? Sign in below!</div>
        <a href="index.php">
          <button class="signInButton">Login</button>
        </a>
      </div>
    </div>
  </body>
</html>
