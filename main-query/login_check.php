<?php
session_start();
if (!isset($_SESSION["fullname"]) && !isset($_SESSION["admin"]) && !isset($_SESSION["network"]) && !isset($_SESSION["support"]) && !isset($_SESSION["helpdesk"]) && !isset($_SESSION["loggedIn"])) {
  header("Location: index.php");
  exit();
}
 ?>
