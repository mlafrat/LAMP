<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Contact</title>
    <script type="text/javascript" src="js/code.js"></script>
    <link rel="stylesheet" href="/css/login.css" />
    <link rel="stylesheet" href="/css/mainPage.css">
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
        <div class="createTitle">Update Contact</div>
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
          <input type="submit" class="signUpButton" value="Update!" />
          <a href="contacts.html">
            <span title="Show all contacts" class="retToMain">Click here to go back to Contacts</span>
            </a>
          <div class="retUserText">Click below to delete contact.</div>
        <a href="login.html">
          <button class="deleteButton">Delete</button>
        </a>
      </div>
    </div>
  </body>
</html>