<?php
session_start();
if (isset($_SESSION["USERID"])) {
  $errorMessage = "Logout--";
}
else {
  $errorMessage = "Session_Time_out";
}
// sessionclear
$_SESSION = array();
//cukkiedestroy
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// sessionclear
session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Logout</title>
  </head>
  <body>
  <div><?php echo $errorMessage; ?></div>
  <ul>
    <li>Back to LoginPage</li>
  </ul>
  <?php
  header("Refresh:2;URL=login.php");?>
  </body>
</html>
