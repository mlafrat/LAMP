<?php
session_start();
  require_once('includes/functions.inc.php');
  require_once('includes/contacts.inc.php');
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
    $_SESSION['error'] = 0;

    $contactFirst = $_POST['contactFirst'];
		$contactLast = $_POST['contactLast'];
    $contactPhone = $_POST['contactPhone'];
    $contactMail = $_POST['contactMail'];
    $userId = $_SESSION['user_id'];
    
    $conn = connectToDatabase();
    if(!$conn){die("Failed to connect to db!".mysqli_connect_error());}
    $contact = add_contact($contactFirst,$contactLast,$contactPhone,$contactMail, $userId);
    header("Location: main.php");
    switch($contact)
    {
      case 1:
        $_SESSION['error'] = 1;
        header("Location: create.php");
        exit();
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
        <div class="frontBox">
          <div class="upperFront">
            <div class="createTitle">Create Contact</div>
            <div class="signUpBelow">Please fill all boxes below.</div>
          </div>
          <div class="midFront">
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
            </form>
          </div>
          <div class="lowerFront">
            <a href="showContacts.php">
              <span title="Show all contacts" class="retToMain">Click here to return to contact list!</span>
            </a>
          </div>  
        </div>
      </div>
    </div>
  </body>
</html>