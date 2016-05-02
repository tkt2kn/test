<?php
session_start();
// login_check teacherONLY
if (!isset($_SESSION["USERID"])){
  header("Location:login.php");
  exit;
}else if($_SESSION["USERID"]!="teacher"){
  header("Location:students.php");
  exit;
  }

echo "WELCOME" . $_SESSION["USERID"]."教師";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>TOPPAGE</title>
  </head>
  <body>
  <ul>
  <li><a href="logout.php">Logout</a></li>
  </ul>
  </body>
</html>
