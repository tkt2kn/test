<?php
session_start();
// login_cheack
if (!isset($_SESSION["USERID"])||$_SESSION["USERID"]=="teacher") {
  header("Location: login.php");
  exit;
}else if($_SESSION["USERID"]=="teacher"){
  header("Location:teacher.php");
  exit;
  }
echo "WELCOME" . $_SESSION["USERID"]."生徒";
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
