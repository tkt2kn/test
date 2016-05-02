<?php
  session_start();
  //login->OK = main jamp
  if($_SESSION[USERID])
    header("Location:main.php");
  // errMS
  $errorMessage = "";
  // escappecheck
  $viewUserId = htmlspecialchars($_POST["userid"], ENT_QUOTES);

  // login_submit
  if (isset($_POST["login"])&&isset($_POST["userid"])&&isset($_POST["password"])) {
      // db session
      try{
        $pdo= new PDO('mysql:host=localhost;dbname=Users;charset=utf8','root','root',
        array(PDO::ATTR_EMULATE_PREPARES=>false));
        $sql="select * from UserTable where UserId=? and Password=?";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array($_POST['userid'],$_POST['password']));
        while($kari=$stmt->fetch(PDO::FETCH_ASSOC)){
          $user[0]=$kari[UserId];
          $user[1]=$kari[Password];
        }
      } catch (PDOException $e) {
          exit('database session error。'.$e->getMessage());
          $errorMessage="database error";
          // $login="login.php";
        }
    // loginOK
    if ($_POST["userid"] == $user[0] && $_POST["password"] == $user[1]) {
      // sessionID_create
      session_regenerate_id(TRUE);
      $_SESSION["USERID"] = $_POST["userid"];
      if($_SESSION["USERID"]=="teacher"){
      header("Location: teacher.php");}
      if($_SESSION["USERID"]!=null){
      header("Location: students.php");}
      // exit;
      else {
        $errorMessage = "ユーザーIDまたはパスワードが入力されていません";
      }
    }
    else {
      $errorMessage = "ユーザーIDまたはパスワードが間違えています";
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>login</title>
  </head>
  <body>
  <form id="loginForm" name="loginForm" action="<?php print($_SERVER['PHP_SELF']) ?>" method="POST">
  <!-- <fieldset> -->
  <!-- <legend>Loginform</legend> -->
  <div><?php echo $errorMessage ?></div>
  <label for="userid">userID:</label><input type="text" id="userid" name="userid" value="<?php echo $viewUserId ?>">
  <br>
  <label for="password">password:</label><input type="password" id="password" name="password" value="">
  <br>
  <label></label><input type="submit" id="login" name="login" value="Login">
  <!-- </fieldset> -->
  </form>
  </body>
</html>
