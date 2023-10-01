<?php
session_start();
    require_once('includes/functions.inc.php');
    debug_to_console("Test");
    $userID = $_SESSION['user_id'];
    $conn = connectToDatabase();
    $query = "SELECT * FROM ContactInfo WHERE userID = '$userID'";
    $result = mysqli_query($conn, $query);

    if (!$conn)
    {
      die("Failed to connect to db!".mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show All Contacts</title>
</head>
<body>
  <table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Phone Number</th>
      <th>E-mail</th>
    </tr>
    <?php while($rows=$result->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $rows['contactFirst'];?></td>
      <td><?php echo $rows['contactLast'];?></td>
      <td><?php echo $rows['phone'];?></td>
      <td><?php echo $rows['email'];?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>