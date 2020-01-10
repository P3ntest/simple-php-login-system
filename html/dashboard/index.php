<?php
session_start();
if(!isset($_SESSION['userid'])) {
  header("Location: /");
  die();
}

include '../config/sql-info.php';

$mysqli = new mysqli($sql_host, $sql_username, $sql_password, $sql_database);
if ($mysqli->connect_errno) {
  die()
}
 ?>

<!DOCTYPE html>
<h1> User Dashboard - <?php
$sql = "SELECT username FROM users WHERE id = ?";
$statement = $mysqli->prepare($sql);
$statement->bind_param('i', $_SESSION['userid']);

$statement->execute();

$result = $statement->get_result();


if ($row = $result->fetch_object()) {
  echo $row->username;
}
?></h1>
<a href="/dashboard/logout_action.php">Logout</a>
