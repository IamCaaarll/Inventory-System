<?php
include ("../database/connection.php");

$display = '';
$display .= '<div class="container-fluid">';
  $display .= '<div class="row">';//DEPLOYED HEADER START
    $display .= '<h2 class="page-title">Deployed';
      $display .= '<button id = "btn_additemdeployed"class="ui positive button mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>Add</button>';
    $display .= '</h2>';
  $display .= '</div>';//DEPLOYED HEADER END
  $display .= '<div class="row">';//DEPLOYED PILL START
    $display .= '<div class="ui buttons">';
      $display .= '<button data-escalationid="cpu"       id="btn_deployed_cpu"         class="big ui button active">CPU</button>';
      $display .= '<button data-escalationid="headset"   id="btn_deployed_headset"     class="big ui button">Headset</button>';
      $display .= '<button data-escalationid="monitor"   id="btn_deployed_monitor"     class="big ui button">Monitor</button>';
      $display .= '<button data-escalationid="keyboard"  id="btn_deployed_keyboard"    class="big ui button">Keyboard</button>';
      $display .= '<button data-escalationid="mouse"     id="btn_deployed_mouse"       class="big ui button">Mouse</button>';
      $display .= '<button data-escalationid="ups"       id="btn_deployed_ups"         class="big ui button">UPS</button>';
      $display .= '<button data-escalationid="switch"    id="btn_deployed_switch"      class="big ui button">Switch</button>';
      $display .= '<button data-escalationid="router"    id="btn_deployed_router"      class="big ui button">Router</button>';
    $display .= '</div>';
  $display .= '</div>';//DEPLOYED PILL END
  $display .= '<div class="row" id="deployed_content">';
    $display .= '<div class="box box-success">';
      $display .= '<div class="box-body">';
        $display .= '<div class="row">';
          $display .= '<div class="col-sm-12">';
            $display .= '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">';
              $display .= '<thead>';
                $display .= '<tr>';
                  $display .= '<th>Item ID</th>';
                  $display .= '<th>Branch</th>';
                  $display .= '<th>Category</th>';
                  $display .= '<th>Brand</th>';
                  $display .= '<th>CC Number</th>';
                  $display .= '<th>PC Number</th>';
                  $display .= '<th>Actions</th>';
                $display .= '</tr>';
              $display .= '</thead>';
              $display .= '<tbody>';
              $result = mysqli_query($conn,"SELECT * FROM item_deployed WHERE category_name = 'cpu'" );/*Select Query for Downtime Tracker*/
              while($row = mysqli_fetch_array($result)){/*retrieving Data from*/
                $display .='<tr role="row" class="odd">';
                  $display .='<td>'.$row['item_id'].'</td>';
                  $display .='<td>'.$row['branch_name'].'</td>';
                  $display .='<td>'.$row['category_name'].'</td>';
                  $display .='<td>'.$row['brand_name'].'</td>';
                  $display .='<td>'.$row['cc_number'].'</td>';
                  $display .='<td>'.$row['pc_number'].'</td>';
                  $display .='<td >';
                    $display .='<a data-trackerid="'.$row['row_id'].'" class="ui blue icon mini basic button" id = "btn_edititem"><i class="edit icon"></i> Edit</a>';
                    $display .='<a data-trackerid="'.$row['row_id'].'"  class="ui red icon mini basic button" id="btn_deleteitem"><i class="trash icon"></i> Delete</a>';
                  $display .='</td>';
                $display .='</tr>';
              }
              $display .= '</tbody>';
            $display .= '</table>';
          $display .= '</div>';
        $display .= '</div>';
      $display .= '</div>';
    $display .= '</div>';
  $display .= '</div>';
$display .= '</div>';

echo $display;

?>
