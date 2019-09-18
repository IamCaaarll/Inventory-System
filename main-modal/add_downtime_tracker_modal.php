<?php
include ("../database/connection.php");/*Database Connection*/
echo'<script>';
    echo'$(function() {';
      echo'$("#downtime_date").daterangepicker({';
        echo'singleDatePicker: true,';
        echo'locale: {';
          echo'format: "Y-MM-DD"';
        echo'}';
      echo'});';
      echo'$("#downtime_start").daterangepicker({';
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
          echo '<input id="downtime_date" type="text" name="text"  value="">';
        echo '</div>';
        echo '<div class="field">';
          echo '<label>Ticket Number</label>';
          echo '<input id="downtime_ticket" type="number" placeholder="Ticket Number">';
        echo '</div>';
        echo '<div class="field">';
          echo '<label>Account</label>';
          echo '<input id="downtime_account" type="text" placeholder="Account">';
        echo '</div>';
        echo '<div class="field">';
          echo '<label>Site</label>';
           echo '<select id="downtime_site" class="ui fluid dropdown">';
             echo '<option selected disabled hidden value="">Select site</option>';
             echo '<option value="1">WCC</option>';
             echo '<option value="2">RET</option>';
           echo '</select>';
        echo '</div>';
      echo '</div>';
      echo '<div class="equal width fields">';
        echo '<div class="field">';
          echo '<label>Incident Type</label>';
          echo '<input id="downtime_incident" type="text" placeholder="Incident Type">';
        echo '</div>';
        echo '<div class="field">';
          echo '<label>Start Time</label>';
          echo '<input id="downtime_start" type="text" name="text"  value="">';
        echo '</div>';
        echo '<div class="field">';
          echo '<label>Agent Affected</label>';
          echo '<input id="downtime_agent" type="text" placeholder="Agent Affected">';
        echo '</div>';
      echo '</div>';
      echo '<div class="equal width fields">';
        echo '<div class="field">';
          echo '<label>Handling Team</label>';
          echo '<input id="downtime_team" type="text" placeholder="Handling Team">';
        echo '</div>';
        echo '<div class="field">';
          echo '<label>Third Party Team</label>';
          echo '<input id="downtime_thirdparty" type="text" placeholder="Third Party Team">';
        echo '</div>';
        echo '<div class="field">';
          echo '<label>Root Cause</label>';
          echo '<input id="downtime_root" type="text" placeholder="Root Cause">';
        echo '</div>';
      echo '</div>';
      echo '<div class="equal width fields">';
        echo '<div class="field">';
          echo '<label>Resolution</label>';
          echo '<textarea id="downtime_resolution"></textarea>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
    echo '<div class="actions">';
      echo '<button id="btn_saveupdate_downtime" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
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
            echo '<input id="tracker_date" type="text" name="text"  value="">';
          echo '</div>';
          echo '<div class="field">';
            echo '<label>Ticket Number</label>';
            echo '<input type="text" placeholder="Ticket Number">';
          echo '</div>';
          echo '<div class="field">';
            echo '<label>Account</label>';
            echo '<input type="text" placeholder="Account">';
          echo '</div>';
          echo '<div class="field">';
            echo '<label>Site</label>';
             echo '<select class="ui fluid dropdown">';
               echo '<option selected disabled hidden value="">Select site</option>';
               echo '<option value="1">WCC</option>';
               echo '<option value="2">RET</option>';
             echo '</select>';
          echo '</div>';
        echo '</div>';
        echo '<div class="equal width fields">';
          echo '<div class="field">';
            echo '<label>Incident Type</label>';
            echo '<input type="text" placeholder="Incident Type">';
          echo '</div>';
          echo '<div class="field">';
            echo '<label>Start Time</label>';
            echo '<input id="downtime_start" type="text" name="text"  value="">';
          echo '</div>';
          echo '<div class="field">';
          echo '<label>Agent Affected</label>';
          echo '<input type="text" placeholder="Agent Affected">';
          echo '</div>';
        echo '</div>';
        echo '<div class="equal width fields">';
          echo '<div class="field">';
            echo '<label>Handling Team</label>';
            echo '<input type="text" placeholder="Handling Team">';
          echo '</div>';
          echo '<div class="field">';
          echo '<label>Third Party Team</label>';
          echo '<input type="text" placeholder="Third Party Team">';
          echo '</div>';
          echo '<div class="field">';
          echo '<label>Root Cause</label>';
          echo '<input type="text" placeholder="Root Cause">';
          echo '</div>';
        echo '</div>';
        echo '<div class="equal width fields">';
          echo '<div class="field">';
            echo '<label>Resolution</label>';
            echo '<textarea></textarea>';
          echo '</div>';
        echo '</div>';
      echo '</div>';

      echo '<div class="actions">';
        echo '<button id="btn_saveupdate_user" class="save" type="button"><i class="ui checkmark icon"></i> Save</button>';
        echo '<button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> Cancel</button>';
      echo '</div>';
    echo '</div>';

  echo $update_output;
}

 ?>
