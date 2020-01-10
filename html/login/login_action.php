<?php
  session_start();
  include '../config/sql-info.php';

  $mysqli = new mysqli($sql_host, $sql_username, $sql_password, $sql_database);
  if ($mysqli->connect_errno) {
    die();
  }

  $sql = "SELECT * FROM users WHERE username = ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param('s', $username);

//Variablen Werte zuweisen
$username = $_POST['username'];

$statement->execute();

$result = $statement->get_result();


if ($row = $result->fetch_object()) {
  if (password_verify($_POST['password'], $row->password)) {

    $_SESSION['userid'] = $row->id;

    header("Location: /dashboard");
    die();
  }else {
    $_SESSION['err_code_login'] = "Password or Username incorret";
    header("Location: /login");
    die();
  }
}else {
  $_SESSION['err_code_login'] = "Password or Username incorret";
  header("Location: /login");
  die();
}


  //echo $_POST['username'];
?>
