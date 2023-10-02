<?php
session_start();
  require_once('includes/functions.inc.php');
  debug_to_console("Test");
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
    $contactFirst = $_POST['contactFirst'];
		$contactLast = $_POST['contactLast'];
    $contactPhone = $_POST['contactPhone'];
    $contactMail = $_POST['contactMail'];
    $userId = $_SESSION['user_id'];
    $conn = connectToDatabase();
    $query = "INSERT INTO ContactInfo (contactFirst, contactLast, phone, email, userID)
              VALUES ('$contactFirst', '$contactLast', '$contactPhone', '$contactMail', '$userId')";
    mysqli_query($conn, $query);

    if (!$conn)
    {
      die("Failed to connect to db!".mysqli_connect_error());
    }
  }

?>

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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <input type="text" class="boxOne" placeholder="First Name" name="contactFirst" required />
          <br />
          <input type="text" class="boxTwo" placeholder="Last Name" name="contactLast" required />
          <br />
          <input type="text" class="boxThree" placeholder="Email" name="contactMail" required />
          <br />
          <input type="tel" class="boxFour" placeholder="Phone: 123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="contactPhone" required />
          <br />
          <input type="submit" class="signUpButton" value="Create!" />
          <a href="showContacts.php">
            <span title="Show all contacts" class="retToMain">Click here to return to contact list!</span>
          </a>
      </div>
    </div>
  </body>
</html>