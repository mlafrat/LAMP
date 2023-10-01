<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create New Contact</title>
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
        <div class="createTitle">Create Contact</div>
        <div class="signUpBelow">Please fill all boxes below.</div>
        <form action="placeholder.php" method="POST">
          <input type="text" class="boxOne" placeholder="First Name" required />
          <br />
          <input type="text" class="boxTwo" placeholder="Last Name" required />
          <br />
          <input type="text" class="boxThree" placeholder="Email" required />
          <br />
          <input
            type="tel"
            class="boxFour"
            placeholder="Phone: 123-456-7890"
            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
            required
          />
          <br />
          <input type="submit" class="signUpButton" value="Create!" />
      </div>
    </div>
  </body>
</html>