<?php
  include ("../database/connection.php");/*Database Connection*/
  session_start();
  mysqli_query($conn,"UPDATE item_list set item_id = '".$_POST["item_id"]."',
                                      brand_name = '".$_POST["brand_name"]."',
                                      category_name = '".$_POST["category_name"]."',
                                      branch_name = '".$_POST["branch_name"]."',
                                      serial_number = '".$_POST["serial_number"]."',
                                      status = '".$_POST["status"]."' WHERE item_id = '".$_POST["old_item_id"]."'");
  echo "Item has been updated!";
?>
