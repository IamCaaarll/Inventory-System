<?php
include ("../database/connection.php");/*Database Connection*/
	mysqli_query($conn,"DELETE FROM item_list WHERE item_id = '".$_POST["item_id"]."'");
	echo "Item has been deleted!";
	?>
