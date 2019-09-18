<?php
  include ("../database/connection.php");/*Database Connection*/
  session_start();
  mysqli_query($conn,"UPDATE user_list set username = '".$_POST["username"]."',
                                      password = '".$_POST["password"]."',
                                      fullname = '".$_POST["fullname"]."',
                                      admin = '".$_POST["admin"]."',
                                      network = '".$_POST["network"]."',
                                      support = '".$_POST["support"]."',
                                      helpdesk = '".$_POST["helpdesk"]."' WHERE username = '".$_POST["old_username"]."'");
  echo "User Account has been updated!";
?>
