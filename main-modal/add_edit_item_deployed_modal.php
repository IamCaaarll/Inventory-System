<?php
include ("../database/connection.php");/*Database Connection*/
if($_POST["item_id"] == "NONE")
{
  echo '<div class="ui form add-item">';
    echo '<div class="field">';
      echo '<label>Item ID</label>';
      echo '<input id="deployed_item_id" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Branch</label>';
       echo '<select id="deployed_branch_name" class="ui fluid dropdown">';
         echo '<option selected disabled hidden value="">Select branch</option>';
         echo '<option value="WCC-Shakeys">WCC-Shakeys</option>';
         echo '<option value="WCC-NinjaVan">WCC-NinjaVan</option>';
         echo '<option value="WCC-7Eleven">WCC-7Eleven</option>';
         echo '<option value="WCC-IRemit">WCC-IRemit</option>';
         echo '<option value="RET-10th">RET-10th</option>';
         echo '<option value="RET-11th">RET-11th</option>';
         echo '<option value="RET-Expansion">RET-Expansion</option>';
       echo '</select>';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Category</label>';
       echo '<select id="deployed_category_name" class="ui fluid dropdown">';
         echo '<option selected disabled hidden value="">Select category</option>';
         echo '<option value="CPU">CPU</option>';
         echo '<option value="Headset">Headset</option>';
         echo '<option value="Keyboard">Keyboard</option>';
         echo '<option value="Monitor">Monitor</option>';
         echo '<option value="Mouse">Mouse</option>';
         echo '<option value="Router">Router</option>';
         echo '<option value="Switch">Switch</option>';
         echo '<option value="UPS">UPS</option>';
       echo '</select>';
    echo '</div>';

    if (isset($_POST["category_name"]) && !empty($_POST["category_name"])) {
      $query = "SELECT DISTINCT brand_name FROM item_list WHERE category_name LIKE '".$_POST['category_name']."'";
      $sql = $connection->query($query);
      if($sql->num_rows > 0)
      {
        echo '<option value="" selected disabled hidden>Select Brand</option>';
        while($data = $sql->fetch_array())
        {
          echo '<option value="'.$data['brand_name'].'">'.$data['brand_name'].'</option>';
        }
      }else {
        echo '<option value="">Brand Not Available</option>';
      }
    }



    // echo '<div class="field">';
    //   echo '<label>Brand Name</label>';
    //   echo '<input id="deployed_brand_name" type="text" name="text"  value="">';
    // echo '</div>';

    echo '<div class="field">';
      echo '<label>CC Number</label>';
      echo '<input id="deployed_cc_number" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>PC Number</label>';
      echo '<input id="deployed_pc_number" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_deployed" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
      echo '<button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> Cancel</button>';
    echo '</div>';
  echo '</div>';
}
else
{
  $result = mysqli_query($conn,"SELECT item_id,branch_name,category_name,brand_name,cc_number,pc_number FROM item_deployed WHERE item_id = '".$_POST["item_id"]."'" );/*Select Query of OJT*/
  while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
  {
    $item_id = $row['item_id'];
    $branch_name = $row['branch_name'];
    $category_name = $row['category_name'];
    $brand_name = $row['brand_name'];
    $cc_number = $row['cc_number'];
    $pc_number = $row['pc_number'];
  }
  $update_output = "";

  echo '<div class="ui form add-item">';
    echo '<div class="field">';
      echo '<label>Item ID</label>';
      echo '<input id="deployed_item_id" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Branch Name</label>';
      echo '<input id="deployed_branch_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Category Name</label>';
      echo '<input id="deployed_category_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>Brand Name</label>';
      echo '<input id="deployed_brand_name" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>CC Number</label>';
      echo '<input id="deployed_cc_number" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="field">';
      echo '<label>PC Number</label>';
      echo '<input id="deployed_pc_number" type="text" name="text"  value="">';
    echo '</div>';

    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_deployed" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
      echo '<button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> Cancel</button>';
    echo '</div>';
  echo '</div>';

  echo $update_output;
}

 ?>
