<?php
  include ("../database/connection.php");/*Database Connection*/

  $check_itemid = mysqli_query($conn,"SELECT item_id from item_deployed where item_id ='".$_POST["item_id"]."'");
  if(mysqli_num_rows($check_itemid) == 0)
  {
    mysqli_query($conn,"INSERT INTO item_deployed(item_id,branch_name,category_name,brand_name,cc_number,pc_number) VALUES('".$_POST["item_id"]."','".$_POST["branch_name"]."','".$_POST["category_name"]."','".$_POST["brand_name"]."','".$_POST["cc_number"]."','".$_POST["pc_number"]."')");
    echo "New Item has been added.";
  }
  else
  {
    echo "This item already exist";
  }
?>
