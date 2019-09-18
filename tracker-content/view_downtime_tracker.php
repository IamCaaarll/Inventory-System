<?php
  include ("../database/connection.php");

  $display = '';
  $display .= '<div class="box box-success">';
    $display .= '<div class="box-body" style="overflow-x:auto;white-space:nowrap;">';
      $display .= '<div class="row">';
        $display .= '<div>';
          $display .= '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">';
            $display .= '<thead>';
              $display .= '<tr>';
                $display .= '<th>Date</th>';
                $display .= '<th>Ticket Number</th>';
                $display .= '<th>Account</th>';
                $display .= '<th>Site</th>';
                $display .= '<th>Incident Type</th>';
                $display .= '<th>Start Time</th>';
                $display .= '<th>End Time</th>';
                $display .= '<th>Duration</th>';
                $display .= '<th>Agent Affected</th>';
                $display .= '<th>Handling Team</th>';
                $display .= '<th>Third Party Team</th>';
                $display .= '<th>Root Cause</th>';
                $display .= '<th>Resolution</th>';
                $display .= '<th>Date Added</th>';
                $display .= '<th>Added By</th>';
                $display .= '<th>Action</th>';
              $display .= '</tr>';
            $display .= '</thead>';
            $display .= '<tbody>';
              $result = mysqli_query($conn,"SELECT * FROM downtime_template ORDER BY rowid" );/*Select Query for Downtime Tracker*/
              while($row = mysqli_fetch_array($result)){/*retrieving Data from*/
                $display .='<tr role="row" class="odd">';
                  $display .='<td>'.$row['date'].'</td>';
                  $display .='<td>'.$row['ticket_number'].'</td>';
                  $display .='<td>'.$row['account'].'</td>';
                  $display .='<td>'.$row['site'].'</td>';
                  $display .='<td>'.$row['incident_type'].'</td>';
                  $display .='<td>'.$row['start_time'].'</td>';
                  $display .='<td>'.$row['end_time'].'</td>';
                  $display .='<td>'.$row['duration'].'</td>';
                  $display .='<td>'.$row['agent_affected'].'</td>';
                  $display .='<td>'.$row['handling_team'].'</td>';
                  $display .='<td>'.$row['third_party_team'].'</td>';
                  $display .='<td>'.$row['root_cause'].'</td>';
                  $display .='<td>'.$row['resolution'].'</td>';
                  $display .='<td>'.$row['date_added'].'</td>';
                  $display .='<td>'.$row['added_by'].'</td>';
                  $display .='<td >';
                    $display .='<a data-trackerid="'.$row['rowid'].'" class="ui blue icon mini basic button" id = "btn_edituser"><i class="edit icon"></i> Edit</a>';
                    $display .='<a data-trackerid="'.$row['rowid'].'"  class="ui red icon mini basic button" id="btn_deleteuser"><i class="trash icon"></i> Delete</a>';
                  $display .='</td>';
                $display .='</tr>';
              }
            $display .= '</tbody>';
          $display .= '</table>';
        $display .= '</div>';
      $display .= '</div>';
    $display .= '</div>';
  $display .= '</div>';

  echo $display;
?>
