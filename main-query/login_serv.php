<?php
  include ("../database/connection.php");/*Database Connection*/

  session_start();
  $query = mysqli_query($conn,"SELECT username,fullname,admin,network,support,helpdesk FROM user_list WHERE username = '".$_POST['login_username']."' AND password = '".$_POST['login_pass']."'");/*Select Query*/
  if(mysqli_num_rows($query) == 0)
  {
    echo "Invalid";
  }
  else
  {
    while($row = mysqli_fetch_array($query))
    {
      $_SESSION["username"] = $row['username'];
      $_SESSION["fullname"] = $row['fullname'];
      $_SESSION["admin"] = $row['admin'];
      $_SESSION["network"] = $row['network'];
      $_SESSION["support"] = $row['support'];
      $_SESSION["helpdesk"] = $row['helpdesk'];
      $_SESSION["loggedIn"] = true;
    }
    echo "Valid";
  }
?>
