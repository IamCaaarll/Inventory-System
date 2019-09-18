<?php
  include ("../database/connection.php");/*Database Connection*/

  $check_itemid = mysqli_query($conn,"SELECT item_id from item_list where item_id ='".$_POST["item_id"]."'");
  if(mysqli_num_rows($check_itemid) == 0)
  {
    mysqli_query($conn,"INSERT INTO item_list(item_id,brand_name,category_name,branch_name,serial_number,status) VALUES('".$_POST["item_id"]."','".$_POST["brand_name"]."','".$_POST["category_name"]."','".$_POST["branch_name"]."','".$_POST["serial_number"]."','".$_POST["status"]."')");
    echo "New Item has been added.";
  }
  else
  {
    echo "This item already exist";
  }
?>
