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
  echo "Username taken.";
}else {
  $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
  $statement = $mysqli->prepare($sql);
  $statement->bind_param('sss', $username, $password, $email);

//Variablen Werte zuweisen
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $_POST['email'];

  $statement->execute();
}

header("Location: /");
die();


  //echo $_POST['username'];
?>
