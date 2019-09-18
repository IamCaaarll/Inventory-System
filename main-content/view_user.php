<?php
  include ("../database/connection.php");
  session_start();

  $display = '';
  $display .= '<div class="container-fluid">';
    $display .= '<div class="row">';//USERS HEADER START
      $display .= '<h2 class="page-title">Users';
        $display .= '<button id = "btn_adduser"class="ui positive button mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>Add</button>';
      $display .= '</h2>';
    $display .= '</div>';//USERS HEADER END
    $display .= '<div class="row">';
      $display .= '<div class="box box-success">';
        $display .= '<div class="box-body">';
          $display .= '<div class="row">';
            $display .= '<div class="col-sm-12">';
              $display .= '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">';
                $display .= '<thead>';
                  $display .= '<tr>';
                    $display .= '<th>Username</th>';
                    $display .= '<th>Name</th>';
                    $display .= '<th>Admin</th>';
                    $display .= '<th>Network</th>';
                    $display .= '<th>Support</th>';
                    $display .= '<th>Helpdesk</th>';
                    $display .= '<th>Actions</th>';
                  $display .= '</tr>';
                $display .= '</thead>';
                $display .= '<tbody>';
                  $user_result = mysqli_query($conn,"SELECT row_id,username,fullname,admin,network,support,helpdesk FROM user_list WHERE username <> '".$_SESSION["username"]."' ORDER BY row_id" );/*Select Query for List of User*/

                  while($row = mysqli_fetch_array($user_result))  /*retrieving Data from*/
                  {
                  $display .='<tr role="row" class="odd">';
                    $display .='<td>'.$row['username'].'</td>';
                    $display .='<td>'.$row['fullname'].'</td>';
                    $display .='<td>'.$row['admin'].'</td>';
                    $display .='<td>'.$row['network'].'</td>';
                    $display .='<td>'.$row['support'].'</td>';
                    $display .='<td>'.$row['helpdesk'].'</td>';
                    $display .='<td >';
                      $display .='<a data-username="'.$row['username'].'" class="ui blue icon mini basic button" id = "btn_edituser"><i class="edit icon"></i> Edit</a>';
                      $display .='<a data-username="'.$row['username'].'"  class="ui red icon mini basic button" id="btn_deleteuser"><i class="trash icon"></i> Delete</a>';
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
