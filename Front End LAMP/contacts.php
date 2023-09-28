<?php
session_start();
require_once('includes/functions.inc.php');
// Check if the user is logged in; if not, redirect to the login page
if (!isset($_SESSION['user_id'])) 
{
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Main</title>
</head>
<body>
    <h2>Hello <?php echo $_SESSION['username']; ?>!</h2>
    <a href="home.html">
        <button>Sign Out</button>
    </a>
    <form method="post" action="includes/logout.inc.php">
        <input type="submit" value="Logout">
    </form>
    </br>
    </br>
    </br>
    <h1 style="align-self: center;">Search Contacts</h1>
    <input type="text" placeholder="Begin typing to search...">
    <input type="button" value="Search">
    <br/>
    <button>Click here to show all contacts</button>
</body>
</html>