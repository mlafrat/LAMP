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
        <title>Dashboard</title>
    </head>
    <body>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>


        <p>This is your dashboard page.</p>

        <!-- Add a logout button to end the session -->
        <form method="post" action="includes/logout.inc.php">
            <input type="submit" value="Logout">
        </form>

        <?php
            print_r($_SESSION);
        ?>
    </body>
</html>
