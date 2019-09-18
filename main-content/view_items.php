<?php
include ("../database/connection.php");

$display = '';
$display .= '<div class="container-fluid">';
  $display .= '<div class="row">';//DEPLOYED HEADER START
  $display .= '<h2 class="page-title">Items';
    $display .= '<button id = "btn_additemitems"class="ui positive button mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>Add</button>';
  $display .= '</h2>';
  $display .= '</div>';//DEPLOYED HEADER END
  $display .= '<div class="row">';//DEPLOYED PILL START
    $display .= '<div class="ui buttons">';
      $display .= '<button data-escalationid="cpu"       id="btn_items_cpu"         class="big ui button active">CPU</button>';
      $display .= '<button data-escalationid="headset"   id="btn_items_headset"     class="big ui button">Headset</button>';
      $display .= '<button data-escalationid="monitor"   id="btn_items_monitor"     class="big ui button">Monitor</button>';
      $display .= '<button data-escalationid="keyboard"  id="btn_items_keyboard"    class="big ui button">Keyboard</button>';
      $display .= '<button data-escalationid="mouse"     id="btn_items_mouse"       class="big ui button">Mouse</button>';
      $display .= '<button data-escalationid="ups"       id="btn_items_ups"         class="big ui button">UPS</button>';
      $display .= '<button data-escalationid="switch"    id="btn_items_switch"      class="big ui button">Switch</button>';
      $display .= '<button data-escalationid="router"    id="btn_items_router"      class="big ui button">Router</button>';
    $display .= '</div>';
  $display .= '</div>';//DEPLOYED PILL END
  $display .= '<div class="row" id="items-content"></div>';
$display .= '</div>';

echo $display;

?>
