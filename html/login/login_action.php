<?php
  include '/config/sql-info.php';

  $mysqli = new mysqli($sql_host, $sql_username, $sql_password, $sql_database);
  if ($mysqli->connect_errno) {
    die("Verbindung fehlgeschlagen: " . $mysqli->$sql_password);
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

    session_start();
    $_SESSION['userid'] = $row->id;

    header("Location: /dashboard");
    die();
  }else {
    echo "Password incorrect";
  }
}else {
  echo "User not found.";
}


  //echo $_POST['username'];
?>
