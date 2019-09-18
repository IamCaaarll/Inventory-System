<?php
  include ("../database/connection.php");

  $display = '';
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
          $result = mysqli_query($conn,"SELECT * FROM item_deployed WHERE category_name = 'ups'" );/*Select Query for Downtime Tracker*/
          while($row = mysqli_fetch_array($result)){/*retrieving Data from*/
            $display .='<tr role="row" class="odd">';
              $display .='<td>'.$row['item_id'].'</td>';
              $display .='<td>'.$row['branch_name'].'</td>';
              $display .='<td>'.$row['category_name'].'</td>';
              $display .='<td>'.$row['brand_name'].'</td>';
              $display .='<td>'.$row['cc_number'].'</td>';
              $display .='<td>'.$row['pc_number'].'</td>';
              $display .='<td >';
                $display .='<a data-trackerid="'.$row['row_id'].'" class="ui blue icon mini basic button" id = "btn_edituser"><i class="edit icon"></i> Edit</a>';
                $display .='<a data-trackerid="'.$row['row_id'].'"  class="ui red icon mini basic button" id="btn_deleteuser"><i class="trash icon"></i> Delete</a>';
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
