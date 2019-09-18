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
                $display .= '<th>Brand</th>';
                $display .= '<th>Category</th>';
                $display .= '<th>Branch</th>';
                $display .= '<th>Serial Number</th>';
                $display .= '<th>Status</th>';
                $display .= '<th>Action</th>';
              $display .= '</tr>';
            $display .= '</thead>';
            $display .= '<tbody>';
            $result = mysqli_query($conn,"SELECT * FROM item_list WHERE category_name = 'cpu'" );/*Select Query for Downtime Tracker*/
            while($row = mysqli_fetch_array($result)){/*retrieving Data from*/
              $display .='<tr role="row" class="odd">';
                $display .='<td>'.$row['item_id'].'</td>';
                $display .='<td>'.$row['brand_name'].'</td>';
                $display .='<td>'.$row['category_name'].'</td>';
                $display .='<td>'.$row['branch_name'].'</td>';
                $display .='<td>'.$row['serial_number'].'</td>';
                $display .='<td>'.$row['status'].'</td>';
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

  echo $display;
?>
