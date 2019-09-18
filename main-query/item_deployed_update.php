<?php
  include ("../database/connection.php");/*Database Connection*/
  session_start();
  mysqli_query($conn,"UPDATE item_deployed set item_id = '".$_POST["item_id"]."',
                                      branch_name = '".$_POST["branch_name"]."',
                                      category_name = '".$_POST["category_name"]."',
                                      brand_name = '".$_POST["brand_name"]."',
                                      cc_number = '".$_POST["cc_number"]."',
                                      pc_number = '".$_POST["pc_number"]."' WHERE item_id = '".$_POST["old_item_id"]."'");
  echo "Item has been updated!";
?>
