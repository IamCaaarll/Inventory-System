<?php
include ("../database/connection.php");/*Database Connection*/
echo'<script>';
    echo'$(function() {';
      echo'$("#leaflet_date").daterangepicker({';
        echo'singleDatePicker: true,';
        echo'locale: {';
          echo'format: "Y-MM-DD"';
        echo'}';
      echo'});';
      echo'$("#leaflet_start").daterangepicker({';
            echo'timePicker: true,';
            echo'timePickerIncrement: 1,';
            echo'locale: {';
                echo'format: "hh:mm A"';
            echo'}';
        echo'}).on("show.daterangepicker", function (ev, picker) {';
            echo'picker.container.find(".calendar-table").hide();';
        echo'});';
    echo'});';
  echo'</script>';
if($_POST["username"] == "NONE")
{

  echo '<div class="ui form">';
    echo '<div class="equal width fields">';
      echo '<div class="field">';
        echo '<label>Date</label>';
        echo '<input id="leaflet_date" type="text" name="text"  value="">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Ticket Number</label>';
        echo '<input id="leaflet_ticket" type="number" placeholder="Ticket Number">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Account</label>';
        echo '<input id="leaflet_account" type="text" placeholder="Account">';
      echo '</div>';
      echo '<div class="field">';
      echo '<label>Issue</label>';
      echo '<input id="leaflet_issue" type="text" placeholder="Issue">';
      echo '</div>';
    echo '</div>';
    echo '<div class="equal width fields">';
      echo '<div class="field">';
        echo '<label>Start Time</label>';
        echo '<input id="leaflet_start" type="text" name="text"  value="">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Handling Team</label>';
        echo '<input id="leaflet_team" type="text" placeholder="Handling Team">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Cause</label>';
        echo '<input id="leaflet_cause" type="text" placeholder="Cause">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Internal/External</label>';
        echo '<input id="leaflet_InternalExternal" type="text" placeholder="Internal/External">';
      echo '</div>';
    echo '</div>';
    echo '<div class="equal width fields">';
      echo '<div class="field">';
        echo '<label>Resolution</label>';
        echo '<textarea id="leaflet_resolution"></textarea>';
      echo '</div>';
    echo '</div>';
    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_leaflet" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
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

  echo '<div class="ui form">';
    echo '<div class="equal width fields">';
      echo '<div class="field">';
        echo '<label>Date</label>';
        echo '<input id="leaflet_date" type="text" name="text"  value="">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Ticket Number</label>';
        echo '<input id="leaflet_ticket" type="number" placeholder="Ticket Number">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Account</label>';
        echo '<input id="leaflet_account" type="text" placeholder="Account">';
      echo '</div>';
      echo '<div class="field">';
      echo '<label>Issue</label>';
      echo '<input id="leaflet_issue" type="text" placeholder="Issue">';
      echo '</div>';
    echo '</div>';
    echo '<div class="equal width fields">';
      echo '<div class="field">';
        echo '<label>Start Time</label>';
        echo '<input id="leaflet_start" type="text" name="text"  value="">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Handling Team</label>';
        echo '<input id="leaflet_team" type="text" placeholder="Handling Team">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Cause</label>';
        echo '<input id="leaflet_cause" type="text" placeholder="Cause">';
      echo '</div>';
      echo '<div class="field">';
        echo '<label>Internal/External</label>';
        echo '<input id="leaflet_InternalExternal" type="text" placeholder="Internal/External">';
      echo '</div>';
    echo '</div>';
    echo '<div class="equal width fields">';
      echo '<div class="field">';
        echo '<label>Resolution</label>';
        echo '<textarea id="leaflet_resolution"></textarea>';
      echo '</div>';
    echo '</div>';
    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_leaflet" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
      echo '<button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> Cancel</button>';
    echo '</div>';
  echo '</div>';

  echo $update_output;
}

 ?>
