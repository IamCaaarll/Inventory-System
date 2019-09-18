<?php
  include ("../database/connection.php");/*Database Connection*/

  $check_userid = mysqli_query($conn,"SELECT username from user_list where username ='".$_POST["username"]."'");
  if(mysqli_num_rows($check_userid) == 0)
  {
    mysqli_query($conn,"INSERT INTO user_list(username,password,fullname,admin,network,support,helpdesk) VALUES('".$_POST["username"]."','user@123','".$_POST["fullname"]."','".$_POST["admin"]."','".$_POST["network"]."','".$_POST["support"]."','".$_POST["helpdesk"]."')");
    echo "New User has been added.";
  }
  else
  {
    echo "This user already exist";
  }
?>
