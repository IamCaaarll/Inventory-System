<?php
  function logoutFunction()
  {
    session_start();
    /*Removing data in SESSION*/
    session_destroy();
    header("Location: ../index.php");
    exit();
  }
  return logoutFunction();
?>
