<?php
  include('Database/connection_jfc.php');

  if (isset($_POST["category_name"]) && !empty($_POST["category_name"])) {
    $query = "SELECT DISTINCT brand_name FROM item_list WHERE brand_name LIKE '".$_POST['category_name']."'";
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
?>
