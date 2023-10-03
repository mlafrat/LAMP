<?php
session_start();
  require_once('includes/functions.inc.php');
  require_once('includes/contacts.inc.php');
  $userID = $_SESSION['user_id'];
  if(!isset($_SESSION['contactID']))
  {
    $_SESSION['contactID'] = $_GET['contact_id'];
  }

  debug_to_console("$contactID");
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
    $_SESSION['error'] = 0;
    $contactID = $_SESSION['contactID'];
    $contactFirst = $_POST['contactFirst'];
		$contactLast = $_POST['contactLast'];
    $contactPhone = $_POST['contactPhone'];
    $contactMail = $_POST['contactMail'];
    $conn = connectToDatabase();
    if (!$conn){die("Failed to connect to db!".mysqli_connect_error());}

    $contact = update_contact($contactID, $contactFirst,$contactLast, $contactPhone, $contactMail);

    switch($contact)
    {
      case 1:
        $_SESSION['error'] = 1;
        header("Location: showContacts.php?error");
        exit();
    }
    header("Location: showContacts.php");
  }
?>

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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <input type="text" class="boxOne" placeholder="First Name" name="contactFirst" required />
          <br />
          <input type="text" class="boxTwo" placeholder="Last Name" name="contactLast" required />
          <br />
          <input type="text" class="boxThree" placeholder="Email" name="contactMail" required />
          <br />
          <input type="tel" class="boxFour" placeholder="Phone: 123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="contactPhone" required />
          <br />
          <br />
          <input type="submit" class="signUpButton" value="Update!" />
        </form>
        <a href="showContacts.php">
          <span title="Show all contacts" class="retToMain">Click here to return to contact list!</span>
        </a>
        <div class="retUserText">Click below to delete contact.</div>
        <a href="delete.php">
          <button class="deleteButton">Delete</button>
        </a>
      </div>
    </div>
  </body>
</html>