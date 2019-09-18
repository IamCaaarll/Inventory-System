<?php
include ("../database/connection.php");/*Database Connection*/
if($_POST["item_id"] == "NONE")
{
  echo '<div class="ui form add-item">';
    echo '<div class="field">';
      echo '<label>Item ID</label>';
      echo '<input id="items_item_id" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Brand Name</label>';
      echo '<input id="items_brand_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Category Name</label>';
      echo '<input id="items_category_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Branch Name</label>';
      echo '<input id="items_branch_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Serial Number</label>';
      echo '<input id="items_serial_number" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Status</label>';
      echo '<input id="items_status" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_items" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
      echo '<button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> Cancel</button>';
    echo '</div>';
  echo '</div>';
}
else
{
  $result = mysqli_query($conn,"SELECT item_id,brand_name,category_name,branch_name,serial_number,status FROM item_list WHERE item_id = '".$_POST["item_id"]."'" );/*Select Query of OJT*/
  while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
  {
    $item_id = $row['item_id'];
    $branch_name = $row['brand_name'];
    $category_name = $row['category_name'];
    $brand_name = $row['branch_name'];
    $cc_number = $row['serial_number'];
    $pc_number = $row['status'];
  }
  $update_output = "";

  echo '<div class="ui form add-item">';
    echo '<div class="field">';
      echo '<label>Item ID</label>';
      echo '<input id="items_item_id" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Brand Name</label>';
      echo '<input id="items_brand_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Category Name</label>';
      echo '<input id="items_category_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Branch Name</label>';
      echo '<input id="items_branch_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Serial Number</label>';
      echo '<input id="items_serial_number" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Status/label>';
      echo '<input id="items_status" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_items" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
      echo '<button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> Cancel</button>';
    echo '</div>';
  echo '</div>';

  echo $update_output;
}

 ?>
