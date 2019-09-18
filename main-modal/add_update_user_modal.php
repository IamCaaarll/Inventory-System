<?php
include ("../database/connection.php");/*Database Connection*/
if($_POST["username"] == "NONE")
{
  echo '<div class="ui form add-user">';
    echo '<div class="field">';
      echo '<label>Username</label>';
      echo '<input id="username" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Full Name</label>';
      echo '<input id="full_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<div class="ui checkbox">';
        echo '<input type="checkbox" id="admin">';
        echo '<label>Admin Privilege</label>';
      echo '</div>';
    echo '</div>';

    echo '<div class="field">';
      echo '<div class="ui checkbox">';
        echo '<input type="checkbox" id="network">';
        echo '<label>Network Privilege</label>';
      echo '</div>';
    echo '</div>';

    echo '<div class="field">';
      echo '<div class="ui checkbox">';
        echo '<input type="checkbox" id="support">';
        echo '<label>Support Privilege</label>';
      echo '</div>';
    echo '</div>';

    echo '<div class="field">';
      echo '<div class="ui checkbox">';
        echo '<input type="checkbox" id="helpdesk">';
        echo '<label>Helpdesk Privilege</label>';
      echo '</div>';
    echo '</div>';

    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_user" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
      echo '<button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> Cancel</button>';
    echo '</div>';
  echo '</div>';
}
else
{
  $result = mysqli_query($conn,"SELECT username,password,fullname,admin,network,support,helpdesk FROM user_list WHERE username = '".$_POST["username"]."'" );/*Select Query of OJT*/
  while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
  {
    $username = $row['username'];
    $password = $row['password'];
    $fullname = $row['fullname'];
    $admin = $row['admin'];
    $network = $row['network'];
    $support = $row['support'];
    $helpdesk = $row['helpdesk'];
  }
  $update_output = "";

  echo '<div class="ui form add-user">';
    echo '<div class="field">';
      echo '<label>Username</label>';
      echo '<input id="username" type="text" value="'.$username.'">';
      echo '<input id="old_username" type="text" value="'.$_POST["username"].'" hidden>';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Password</label>';
      echo '<input id="password" type="password" value="'.$password.'">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Confirm Password</label>';
      echo '<input id="confirm_password" type="password" value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Full Name</label>';
      echo '<input id="full_name" type="text" value="'.$fullname.'">';
    echo '</div>';

    echo '<div class="field">';
      echo '<div class="ui checkbox">';
        if($admin === 'Y'){
          echo '<input type="checkbox" id="admin" checked>';
        }else {
          echo '<input type="checkbox" id="admin">';
        }
        echo '<label>Admin Privilege</label>';
      echo '</div>';
    echo '</div>';

    echo '<div class="field">';
      echo '<div class="ui checkbox">';
        if($network === 'Y'){
          echo '<input type="checkbox" id="network" checked>';
        }else {
          echo '<input type="checkbox" id="network">';
        }
        echo '<label>Network Privilege</label>';
      echo '</div>';
    echo '</div>';

    echo '<div class="field">';
      echo '<div class="ui checkbox">';
        if($support === 'Y'){
          echo '<input type="checkbox" id="support" checked>';
        }else {
          echo '<input type="checkbox" id="support">';
        }
        echo '<label>Support Privilege</label>';
      echo '</div>';
    echo '</div>';

    echo '<div class="field">';
      echo '<div class="ui checkbox">';
        if($helpdesk === 'Y'){
          echo '<input type="checkbox" id="helpdesk" checked>';
        }else {
          echo '<input type="checkbox" id="helpdesk">';
        }
        echo '<label>Helpdesk Privilege</label>';
      echo '</div>';
    echo '</div>';

    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_user" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
      echo '<button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> Cancel</button>';
    echo '</div>';
  echo '</div>';

  echo $update_output;
}

 ?>
