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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Main</title>
    <script type="text/javascript" src="js/code.js"></script>
    <link rel="stylesheet" href="/css/mainPage.css" />
    <link rel="stylesheet" href="globals.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Ubuntu"
    />
  </head>
  <body>
    <div class="div">
      <div class="welcomeTxt">
        Welcome,
        <?php echo $_SESSION['username']; ?>!!
      </div>
    </div>
    <div class="containerCreateNew">
      <a href="create.php">
        <button class="createNewBox">Create New Contact</button>
      </a>
    </div>
    <div class="containerSignOut">
      <a href="home.php">
        <button class="signOutBox">Sign Out</button>
      </a>
    </div>
    <div class="containerSearch">
      <div class="searchTxt">Search Contacts</div>
      <input
        type="text"
        class="searchBar"
        placeholder="Begin typing to search..."
      />
      <input type="button" class="searchButton" value="Search" />
    </div>
    <a href="contactList.php">
      <span title="Show all contacts" class="showAll"
        >Click here to show all contacts</span
      >
    </a>
  </body>
</html>