<?php
include ("../database/connection.php");/*Database Connection*/
	mysqli_query($conn,"DELETE FROM user_list WHERE username = '".$_POST["username"]."'");
	echo "User has been deleted!";
	?>
