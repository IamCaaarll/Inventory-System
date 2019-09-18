
<?php
  include ("../database/connection.php");

  $display = '';
  $display .= '<div class="container-fluid">';
    $display .= '<div class="row">';/* TRACKER HEADER START */
      $display .= '<h2 class="page-title">Downtime Tracker';
        $display .= '<button id = "btn_addtracker"class="ui positive button mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>Add</button>';
      $display .= '</h2>';
    $display .= '</div>';/* TRACKER HEADER END */
    $display .= '<div class="row">';/* TRACKER PILL START */
      $display .= '<div class="ui buttons">';
        $display .= '<button data-trackerid="downtime" id="btn_downtime" class="big ui button active">Downtime</button>';
        $display .= '<button data-trackerid="ironman" id="btn_ironman" class="big ui button">Ironman</button>';
        $display .= '<button data-trackerid="leaflet" id="btn_leaflet" class="big ui button">Leaflet</button>';
      $display .= '</div>';
    $display .= '</div>';/* TRACKER PILL END */
    $display .= '<div class="row" id="tracker_content">';/* TRACKER CONTENT START */
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
    $display .= '</div>';/* TRACKER CONTENT END */
  $display .= '</div>';

  echo $display;

?>
