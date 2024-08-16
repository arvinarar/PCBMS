<!DOCTYPE html>
<html lang="en">

<?php
session_start();
date_default_timezone_set('UTC');
date_default_timezone_set("Asia/Manila");

if (!isset($_SESSION['username'])) {
  header("location: ../");
} else {
  $fullname = $_SESSION['lname'] . ", " .
    $_SESSION['fname'] . " " .
    $_SESSION['mname'] . " - " . $_SESSION['role'];
  $user = $_SESSION['username'];

  ?>

  <head>
    <link rel='icon' href='../images/vsulogo.ico' type='image/x-icon' />
    <title>PCBMS</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet" />
    <script type="text/javascript" src="../js/setDateTime.js"></script>
  </head>

  <?php
  if ($_SESSION['role'] == 'Manager') {
    include_once 'mgtheader.php';
  } else if ($_SESSION['role'] == 'Cashier') {
    include_once 'cshheader.php';
  } else if ($_SESSION['role'] == 'Personnel') {
    include_once 'psnheader.php';
  }
}
?>