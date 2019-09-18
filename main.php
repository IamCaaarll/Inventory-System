<?php
  require ("main-query/login_check.php");
?>
 <html lang="en" dir="ltr">
  <head>
    <title>Inventory</title>
    <link rel="stylesheet" type="text/css" href="libraries/bootstrap.min.v4.1.3.css">
    <link rel="stylesheet" type="text/css" href="libraries/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="libraries/style.css">
    <link rel="stylesheet" type="text/css" href="libraries/daterangepicker.css" />
    <link href="libraries/dataTables.bootstrap.css" rel="stylesheet">
    <link href="libraries/dataTables.responsive.css" rel="stylesheet">
  </head>
  <body>
    <div class="ui modal medium add" id ="myModal">
      <div class="header" id ="modal-title">Add New User</div>
      <div class="content" id= "modal-content"></div>
    </div>
    <div class="ui modal medium add" id ="myModal">
      <div class="header" id ="modal-title">Add New Deployed Item</div>
      <div class="content" id= "modal-content"></div>
    </div>
    <div class="ui modal medium add" id ="myModal">
      <div class="header" id ="modal-title">Add New Item</div>
      <div class="content" id= "modal-content"></div>
    </div>
    <div class="wrapper">
      <nav id="sidebar" class="active">
        <div class="sidebar-header bg-lightgreen  ">
          <div class="logo">
            <a class="simple-text">
                <img src="libraries/GICFlogo.png">
            </a>
          </div>
        </div>
        <ul class="list-unstyled components">
          <li>
            <a  id="dashboard" style="cursor:pointer;">
              <i class="ui icon sliders horizontal"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a id="items" style="cursor:pointer;">
              <i class="ui icon clipboard plus"></i>
              <p>Items</p>
            </a>
          </li>
          <li>
            <a id="deployed" style="cursor:pointer;">
              <i class="ui icon share square"></i>
              <p>Deployed</p>
            </a>
          </li>
      <?php
        if($_SESSION["helpdesk"] !== 'N'){
          echo "<li>";
            echo "<a id=\"tracker\" style=\"cursor:pointer;\">";
              echo "<i class=\"ui icon eye\"></i>";
              echo "<p>Tracker</p>";
            echo "</a>";
          echo "</li>";
        }
      ?>
      <?php
        if($_SESSION["admin"] !== 'N'){
          echo "<li>";
            echo "<a id=\"user\" style=\"cursor:pointer;\">";
              echo "<i class=\"ui icon user circle\"></i>";
              echo "<p>Users</p>";
            echo "</a>";
          echo "</li>";
        }
      ?>
        </ul>
      </nav>
      <div id="body" class="active">
        <nav class="navbar navbar-expand-lg navbar-light bg-lightgreen">
          <div class="container-fluid">
            <button type="button" id="slidesidebar" class="ui icon button btn-light-outline">
                <i class="ui icon bars"></i> Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto navmenu">
                <li class="nav-item">
                  <div class="ui pointing link dropdown item" tabindex="0" >
                    <i class="ui icon user outline"></i><label style = "cursor:pointer;" id ="name_user"></label>
                    <i class="dropdown icon"></i>
                    <div class="menu" tabindex="-1">
                      <a class="item" id="user_update">
                        <i class="ui icon user"></i> Update User
                      </a>
                      <a class="item" id = "change_pass">
                        <i class="ui icon lock"></i> Change Password
                      </a>
                      <div class="divider"></div>
                      <a class="item" id ="btn_logout" href="main-query/session_logout.php">
                        <i class="ui icon power"></i> Logout
                      </a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="content" id="content"></div>
      </div>
    </div>
  </body>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="libraries/jquery-3.3.1.min.js"></script>
  <script src="libraries/bootstrap.min.v4.1.3.js"></script>
  <script src="libraries/semantic.min.js"></script>
  <script type="text/javascript" src="libraries/moment.min.js"></script>
  <script type="text/javascript" src="libraries/daterangepicker.min.js"></script>
  <script src="libraries/bootstrap-notify.js"></script>

  <!-- Start Function Script for Navigation bar -->
  <script type="text/javascript">
    $(document).ready(function() {
      refresh_dashboard();
      $('#name_user').text('<?php echo $_SESSION["fullname"]; ?>');
      $("#dashboard").prop( "disabled", true );
      $("#dashboard").css('color', 'gray');
      $('#content').load('main-content/view_dashboard.php');
      $('#slidesidebar').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#body').toggleClass('active');
      });

      $(document).on('click','#dashboard',function()
      {
        /*Disable the button*/
        $("#dashboard").prop( "disabled", true );
        $("#items").prop( "disabled", false );
        $("#deployed").prop( "disabled", false );
        $("#tracker").prop( "disabled", false );
        $("#user").prop( "disabled", false );
        /*change the text color of button*/
        $("#dashboard").css('color', 'gray');
        $("#items").css('color', 'white');
        $("#deployed").css('color', 'white');
        $("#tracker").css('color', 'white');
        $("#user").css('color', 'white');

        refresh_dashboard();
        $('#content').load('main-content/view_dashboard.php');
      });

      $(document).on('click','#items',function()
      {
        /*Disable the button*/
        $("#dashboard").prop( "disabled", false );
        $("#items").prop( "disabled", true );
        $("#deployed").prop( "disabled", false );
        $("#tracker").prop( "disabled", false );
        $("#user").prop( "disabled", false );
        /*change the text color of button*/
        $("#dashboard").css('color', 'white');
        $("#items").css('color', 'gray');
        $("#deployed").css('color', 'white');
        $("#tracker").css('color', 'white');
        $("#user").css('color', 'white');

        clearTimeout(dashboard);
        $('#content').load('main-content/view_items.php');
      });

      $(document).on('click','#deployed',function()
      {
        /*Disable the button*/
        $("#dashboard").prop( "disabled", false );
        $("#items").prop( "disabled", false );
        $("#deployed").prop( "disabled", true );
        $("#tracker").prop( "disabled", false );
        $("#user").prop( "disabled", false );
        /*change the text color of button*/
        $("#dashboard").css('color', 'white');
        $("#items").css('color', 'white');
        $("#deployed").css('color', 'gray');
        $("#tracker").css('color', 'white');
        $("#user").css('color', 'white');

        clearTimeout(dashboard);
        $('#content').load('main-content/view_deployed.php');
      });

      $(document).on('click','#tracker',function()
      {
        /*Disable the button*/
        $("#dashboard").prop( "disabled", false );
        $("#items").prop( "disabled", false );
        $("#deployed").prop( "disabled", false );
        $("#tracker").prop( "disabled", true );
        $("#user").prop( "disabled", false );
        /*change the text color of button*/
        $("#dashboard").css('color', 'white');
        $("#items").css('color', 'white');
        $("#deployed").css('color', 'white');
        $("#tracker").css('color', 'gray');
        $("#user").css('color', 'white');
        /* SET ACTIVE BUTTON */
        $("#btn_downtime").toggleClass('active');
        $("#btn_ironman").removeClass('active');
        $("#btn_leaflet").removeClass('active');

        clearTimeout(dashboard);
        $('#content').load('main-content/view_tracker.php');
        $('#tracker_content').load('tracker-content/view_downtime_tracker.php');
      });

      $(document).on('click','#user',function()
      {
        /*Disable the button*/
        $("#dashboard").prop( "disabled", false );
        $("#items").prop( "disabled", false );
        $("#deployed").prop( "disabled", false );
        $("#tracker").prop( "disabled", false );
        $("#user").prop( "disabled", true );
        /*change the text color of button*/
        $("#dashboard").css('color', 'white');
        $("#items").css('color', 'white');
        $("#deployed").css('color', 'white');
        $("#tracker").css('color', 'white');
        $("#user").css('color', 'gray');

        clearTimeout(dashboard);
        $('#content').load('main-content/view_user.php');
      });

      function refresh_dashboard()
      {
        dashboard = setTimeout(function()
        {
          $('#content').load('main-content/view_dashboard.php');/*Refresh the list of attendance*/
          refresh_dashboard();
        },1000);
      }
    });

    $(window).resize(function(){
      if($(window).width() <= 768){
        $('#sidebar, #body').addClass('active');
      }
    });

    $('.ui.dropdown').dropdown();
  </script>
  <!-- End Function Script for Navigation bar -->

  <!-- Start Function Script for User View-->
  <script type="text/javascript">
    $(document).on('click','#btn_adduser',function(){
      var username="NONE";
      $.ajax({
        url: 'main-modal/add_update_user_modal.php',
        method:"POST",
        data:{username:username},
        success:function(data)
        {
          $('#modal-content').html(data);
          $('#myModal').modal('show');
          $("#modal-title").html('Add New User');
          $("#btn_saveupdate_user").html('Save');
        }
      })
    });
    $(document).on('click', '#btn_deleteuser', function(){
      var username=$(this).data("username");
      if(confirm("Are you sure you want to delete this?")){
        $.ajax({
          url: 'main-query/user_delete.php',
          method: 'POST',
          data: {username:username},
          success:function(data){
            $.notify({
                      icon: 'ui icon check',
                      message: data},
                      {type: 'success',timer: 200}
                    );
            $('#content').load('main-content/view_user.php');
          }
        })
      }
    });
    $(document).on('click','#btn_edituser',function(){
      var username=$(this).data("username");
      $.ajax({
        url: 'main-modal/add_update_user_modal.php',
        method:"POST",
        data:{username:username},
        success:function(data){
            $('#modal-content').html(data);
            $('#myModal').modal('show');
            $("#modal-title").html('Update User');
            $("#btn_saveupdate_user").html('Update');
        }
      })
    });
    $(document).on('click', '#btn_saveupdate_user', function(){
      switch ($("#modal-title").text()) {
        case 'Add New User':
          if($('#username').val() == "" || $('#full_name').val() == ""){
            $.notify({
                      icon: 'ui icon check',
                      message: "Please fill the form completely!"},
                      {type: 'success',timer: 200}
                    );
          }else{
            var admin = $('#admin').is(":checked") ? 'Y' : 'N';
            var network = $('#network').is(":checked") ? 'Y' : 'N';
            var support = $('#support').is(":checked") ? 'Y' : 'N';
            var helpdesk = $('#helpdesk').is(":checked") ? 'Y' : 'N';
            $.ajax({
              url: 'main-query/user_add.php',
              method:"POST",
              data:{username:$('#username').val(),
                    fullname:$('#full_name').val(),
                    admin:admin,
                    network:network,
                    support:support,
                    helpdesk:helpdesk},
              success:function(data){
                $.notify({
                          icon: 'ui icon check',
                          message: data},
                          {type: 'success',timer: 200}
                        );
                $('#content').load('main-content/view_user.php');
                $('#myModal').modal('hide');
              }
            });
          }
        break;
        case 'Update User':
          if($('#username').val() == "" || $('#password').val() == "" || $('#confirm_password').val() == "" || $('#full_name').val() == ""){
            $.notify({
                      icon: 'ui icon check',
                      message: "Please fill the form completely!"},
                      {type: 'success',timer: 200}
                    );
          }
          else
          {
            if($('#password').val() != $('#confirm_password').val()){
              $.notify({
                        icon: 'ui icon check',
                        message: "Password confirmation does not match!"},
                        {type: 'success',timer: 200}
                      );
            }else{
              var old_username=$(this).data("username");
              var admin = $('#admin').is(":checked") ? 'Y' : 'N';
              var network = $('#network').is(":checked") ? 'Y' : 'N';
              var support = $('#support').is(":checked") ? 'Y' : 'N';
              var helpdesk = $('#helpdesk').is(":checked") ? 'Y' : 'N';
              $.ajax({
                url: 'main-query/user_update.php',
                method:"POST",
                data:{old_username:$('#old_username').val(),
                      username:$('#username').val(),
                      password:$('#password').val(),
                      fullname:$('#full_name').val(),
                      admin:admin,
                      network:network,
                      support:support,
                      helpdesk:helpdesk},
                success:function(data)
                {
                  $.notify({
                            icon: 'ui icon check',
                            message: data},
                            {type: 'success',timer: 200}
                          );
                  $('#content').load('main-content/view_user.php');
                  $('#myModal').modal('hide');
                }
              });
            }
          }
        break;
        default:
          // NO DEFAULT ACTION
        break;
      }
    });
  </script>
  <!-- End Function Script for User View-->

  <!-- Start Function Script for Tracker View-->
  <script type="text/javascript">
    $(document).on('click','#btn_downtime',function(){

      $("#btn_downtime").toggleClass('active');
      $("#btn_ironman").removeClass('active');
      $("#btn_leaflet").removeClass('active');

      $('#tracker_content').load('tracker-content/view_downtime_tracker.php');



    });

    $(document).on('click','#btn_addtracker',function(){

      var username="NONE";
      $.ajax({
        url: 'main-modal/add_downtime_tracker_modal.php',
        method:"POST",
        data:{username:username},
        success:function(data)
        {
          $('#modal-content').html(data);
          $('#myModal').modal('show');
          $("#modal-title").html('Add New Record');
          $("#btn_saveupdate_user").html('Save');
          $('select.dropdown').dropdown();
        }
      })



    });

    $(document).on('click','#btn_ironman',function(){

      $("#btn_downtime").removeClass('active');
      $("#btn_ironman").toggleClass('active');
      $("#btn_leaflet").removeClass('active');

      $('#tracker_content').load('tracker-content/view_ironman_tracker.php');
    });

    $(document).on('click','#btn_leaflet',function(){

      $("#btn_downtime").removeClass('active');
      $("#btn_ironman").removeClass('active');
      $("#btn_leaflet").toggleClass('active');

      $('#tracker_content').load('tracker-content/view_ironman_tracker.php');
    });

  </script>
  <!-- End Function Script for Tracker View-->

  <!-- Start Function Script for Deployed View-->
  <script type="text/javascript">
    $(document).on('click','#btn_deployed_cpu',function(){

      $("#btn_cpu").toggleClass('active');
      $("#btn_headset").removeClass('active');
      $("#btn_monitor").removeClass('active');
      $("#btn_keyboard").removeClass('active');
      $("#btn_mouse").removeClass('active');
      $("#btn_ups").removeClass('active');
      $("#btn_switch").removeClass('active');
      $("#btn_router").removeClass('active');

      $('#deployed_content').load('deployed-content/cpu.php');

    });

    $(document).on('click','#btn_deployed_headset',function(){

      $("#btn_cpu").removeClass('active');
      $("#btn_headset").toggleClass('active');
      $("#btn_monitor").removeClass('active');
      $("#btn_keyboard").removeClass('active');
      $("#btn_mouse").removeClass('active');
      $("#btn_ups").removeClass('active');
      $("#btn_switch").removeClass('active');
      $("#btn_router").removeClass('active');

      $('#deployed_content').load('deployed-content/headset.php');

    });

    $(document).on('click','#btn_deployed_monitor',function(){

      $("#btn_cpu").removeClass('active');
      $("#btn_headset").removeClass('active');
      $("#btn_monitor").toggleClass('active');
      $("#btn_keyboard").removeClass('active');
      $("#btn_mouse").removeClass('active');
      $("#btn_ups").removeClass('active');
      $("#btn_switch").removeClass('active');
      $("#btn_router").removeClass('active');

      $('#deployed_content').load('deployed-content/monitor.php');

    });

    $(document).on('click','#btn_deployed_keyboard',function(){

      $("#btn_cpu").removeClass('active');
      $("#btn_headset").removeClass('active');
      $("#btn_monitor").removeClass('active');
      $("#btn_keyboard").toggleClass('active');
      $("#btn_mouse").removeClass('active');
      $("#btn_ups").removeClass('active');
      $("#btn_switch").removeClass('active');
      $("#btn_router").removeClass('active');

      $('#deployed_content').load('deployed-content/keyboard.php');

    });

    $(document).on('click','#btn_deployed_mouse',function(){

      $("#btn_cpu").removeClass('active');
      $("#btn_headset").removeClass('active');
      $("#btn_monitor").removeClass('active');
      $("#btn_keyboard").removeClass('active');
      $("#btn_mouse").toggleClass('active');
      $("#btn_ups").removeClass('active');
      $("#btn_switch").removeClass('active');
      $("#btn_router").removeClass('active');

      $('#deployed_content').load('deployed-content/mouse.php');

    });

    $(document).on('click','#btn_deployed_ups',function(){

      $("#btn_cpu").removeClass('active');
      $("#btn_headset").removeClass('active');
      $("#btn_monitor").removeClass('active');
      $("#btn_keyboard").removeClass('active');
      $("#btn_mouse").removeClass('active');
      $("#btn_ups").toggleClass('active');
      $("#btn_switch").removeClass('active');
      $("#btn_router").removeClass('active');

      $('#deployed_content').load('deployed-content/ups.php');

    });

    $(document).on('click','#btn_deployed_switch',function(){

      $("#btn_cpu").removeClass('active');
      $("#btn_headset").removeClass('active');
      $("#btn_monitor").removeClass('active');
      $("#btn_keyboard").removeClass('active');
      $("#btn_mouse").removeClass('active');
      $("#btn_ups").removeClass('active');
      $("#btn_switch").toggleClass('active');
      $("#btn_router").removeClass('active');

      $('#deployed_content').load('deployed-content/switch.php');

    });

    $(document).on('click','#btn_deployed_router',function(){

      $("#btn_cpu").removeClass('active');
      $("#btn_headset").removeClass('active');
      $("#btn_monitor").removeClass('active');
      $("#btn_keyboard").removeClass('active');
      $("#btn_mouse").removeClass('active');
      $("#btn_ups").removeClass('active');
      $("#btn_switch").removeClass('active');
      $("#btn_router").toggleClass('active');

      $('#deployed_content').load('deployed-content/router.php');

    });

  </script>
  <script type="text/javascript">
    $(document).on('click','#btn_additemdeployed',function(){
      var item_id="NONE";
      $.ajax({
        url: 'main-modal/add_edit_item_deployed_modal.php',
        method:"POST",
        data:{item_id:item_id},
        success:function(data)
        {
          $('#modal-content').html(data);
          $('#myModal').modal('show');
          $("#modal-title").html('Add New Deployed Item');
          $("#btn_saveupdate_item").html('Save');
        }
      })
    });
    $(document).on('click', '#btn_deleteitemdeployed', function(){
      var item_id=$(this).data("item_id");
      if(confirm("Are you sure you want to delete this?")){
        $.ajax({
          url: 'main-query/item_deployed_delete.php',
          method: 'POST',
          data: {item_id:item_id},
          success:function(data){
            $.notify({
                      icon: 'ui icon check',
                      message: data},
                      {type: 'success',timer: 200}
                    );
            $('#content').load('main-content/view_deployed.php');
          }
        })
      }
    });
    $(document).on('click','#btn_edititemdeployed',function(){
      var item_id=$(this).data("item_id");
      $.ajax({
        url: 'main-modal/add_edit_item_deployed_modal.php',
        method:"POST",
        data:{item_id:item_id},
        success:function(data){
            $('#modal-content').html(data);
            $('#myModal').modal('show');
            $("#modal-title").html('Update Item');
            $("#btn_saveupdate_item").html('Update');
        }
      })
    });

    $(document).on('click', '#btn_saveupdate_item', function(){
      switch ($("#modal-title").text()) {
        case 'Add New Deployed Item':
          if($('#item_id').val() == "" || $('#branch_name').val() == "" || $('#category_name').val() == ""
          || $('#brand_name').val() == "" || $('#cc_number').val() == "" || $('#pc_number').val() == ""){
            $.notify({
                      icon: 'ui icon check',
                      message: "Please fill the form completely!"},
                      {type: 'success',timer: 200}
                    );
          }else{
            $.ajax({
              url: 'main-query/item_deployed_add.php',
              method:"POST",
              data:{item_id:$('#item_id').val(),
                    branch_name:$('#branch_name').val(),
                    category_name:$('#category_name').val(),
                    brand_name:$('#brand_name').val(),
                    cc_number:$('#cc_number').val(),
                    pc_number:$('#pc_number').val()},
              success:function(data){
                $.notify({
                          icon: 'ui icon check',
                          message: data},
                          {type: 'success',timer: 200}
                        );
                $('#content').load('main-content/view_deployed.php');
                $('#myModal').modal('hide');
              }
            });
          }
        break;
        case 'Update Item':
        if($('#item_id').val() == "" || $('#branch_name').val() == "" || $('#category_name').val() == ""
        || $('#brand_name').val() == "" || $('#cc_number').val() == "" || $('#pc_number').val() == ""){
            $.notify({
                      icon: 'ui icon check',
                      message: "Please fill the form completely!"},
                      {type: 'success',timer: 200}
                    );
          }
          else
          {
              var old_item_id=$(this).data("item_id");
              $.ajax({
                url: 'main-query/item_deployed_update.php',
                method:"POST",
                data:{old_item_id:$('#old_item_id').val(),
                      item_id:$('#item_id').val(),
                      branch_name:$('#branch_name').val(),
                      category_name:$('#category_name').val(),
                      brand_name:$('#brand_name').val(),
                      cc_number:$('#cc_number').val(),
                      pc_number:$('#pc_number').val()},
                success:function(data)
                {
                  $.notify({
                            icon: 'ui icon check',
                            message: data},
                            {type: 'success',timer: 200}
                          );
                  $('#content').load('main-content/view_deployed.php');
                  $('#myModal').modal('hide');
                }
              });

          }
        break;
        default:
          // NO DEFAULT ACTION
        break;
      }
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#deployed_category_name').on('change',function(){
        if($(this).val()){
          $.ajax({
            type:'POST',
            url:'add_edit_item_deployed_modal.php',
            data:'category_name='+$(this).val(),
            success:function(html){
              $('#Brand').html(html);
            }
          })
        }else {
          $('#Brand').html('<option value="" selected disabled hidden>Select Category First</option>');
        }
      });
      $('#Brand').on('change',function(){
        if($(this).val()){
          $.ajax({
            type:'POST',
            url:'add_edit_item_deployed_modal.php',
            data:'category_name'+$(this).val(),
            success:function(html){
              $('#Brand').html(html);
            }
          })
        }else {
          $('#Brand').html('<option value="" selected disabled hidden>Select Subcategory First</option>');
        }
      });
    })
  </script>
  <!-- End Function Script for Deployed View-->

  <!-- Start Function Script for Items View-->
  <script type="text/javascript">
      $(document).on('click','#btn_items_cpu',function(){

        $("#btn_cpu").toggleClass('active');
        $("#btn_headset").removeClass('active');
        $("#btn_monitor").removeClass('active');
        $("#btn_keyboard").removeClass('active');
        $("#btn_mouse").removeClass('active');
        $("#btn_ups").removeClass('active');
        $("#btn_switch").removeClass('active');
        $("#btn_router").removeClass('active');

          $('#items-content').load('items-content/cpu.php');

      });

      $(document).on('click','#btn_items_headset',function(){

        $("#btn_cpu").removeClass('active');
        $("#btn_headset").toggleClass('active');
        $("#btn_monitor").removeClass('active');
        $("#btn_keyboard").removeClass('active');
        $("#btn_mouse").removeClass('active');
        $("#btn_ups").removeClass('active');
        $("#btn_switch").removeClass('active');
        $("#btn_router").removeClass('active');

        $('#items-content').load('items-content/headset.php');

      });

      $(document).on('click','#btn_items_monitor',function(){

        $("#btn_cpu").removeClass('active');
        $("#btn_headset").removeClass('active');
        $("#btn_monitor").toggleClass('active');
        $("#btn_keyboard").removeClass('active');
        $("#btn_mouse").removeClass('active');
        $("#btn_ups").removeClass('active');
        $("#btn_switch").removeClass('active');
        $("#btn_router").removeClass('active');

        $('#items-content').load('items-content/monitor.php');

      });

      $(document).on('click','#btn_items_keyboard',function(){

        $("#btn_cpu").removeClass('active');
        $("#btn_headset").removeClass('active');
        $("#btn_monitor").removeClass('active');
        $("#btn_keyboard").toggleClass('active');
        $("#btn_mouse").removeClass('active');
        $("#btn_ups").removeClass('active');
        $("#btn_switch").removeClass('active');
        $("#btn_router").removeClass('active');

        $('#items-content').load('items-content/keyboard.php');

      });

      $(document).on('click','#btn_items_mouse',function(){

        $("#btn_cpu").removeClass('active');
        $("#btn_headset").removeClass('active');
        $("#btn_monitor").removeClass('active');
        $("#btn_keyboard").removeClass('active');
        $("#btn_mouse").toggleClass('active');
        $("#btn_ups").removeClass('active');
        $("#btn_switch").removeClass('active');
        $("#btn_router").removeClass('active');

        $('#items-content').load('items-content/mouse.php');

      });

      $(document).on('click','#btn_items_ups',function(){

        $("#btn_cpu").removeClass('active');
        $("#btn_headset").removeClass('active');
        $("#btn_monitor").removeClass('active');
        $("#btn_keyboard").removeClass('active');
        $("#btn_mouse").removeClass('active');
        $("#btn_ups").toggleClass('active');
        $("#btn_switch").removeClass('active');
        $("#btn_router").removeClass('active');

        $('#items-content').load('items-content/ups.php');

      });

      $(document).on('click','#btn_items_switch',function(){

        $("#btn_cpu").removeClass('active');
        $("#btn_headset").removeClass('active');
        $("#btn_monitor").removeClass('active');
        $("#btn_keyboard").removeClass('active');
        $("#btn_mouse").removeClass('active');
        $("#btn_ups").removeClass('active');
        $("#btn_switch").toggleClass('active');
        $("#btn_router").removeClass('active');

        $('#items-content').load('items-content/switch.php');

      });

      $(document).on('click','#btn_items_router',function(){

        $("#btn_cpu").removeClass('active');
        $("#btn_headset").removeClass('active');
        $("#btn_monitor").removeClass('active');
        $("#btn_keyboard").removeClass('active');
        $("#btn_mouse").removeClass('active');
        $("#btn_ups").removeClass('active');
        $("#btn_switch").removeClass('active');
        $("#btn_router").toggleClass('active');

        $('#items-content').load('items-content/router.php');

      });

    </script>
      <!-- End Function Script for Deployed Items View-->
    <!-- End Function Script for Items View-->
    <!-- End Function Script for Items View-->
    <!-- End Function Script for Items View-->
  <script type="text/javascript">
    $(document).on('click','#btn_additemitems',function(){
      var item_id="NONE";
      $.ajax({
        url: 'main-modal/add_edit_item_items_modal.php',
        method:"POST",
        data:{item_id:item_id},
        success:function(data)
        {
          $('#modal-content').html(data);
          $('#myModal').modal('show');
          $("#modal-title").html('Add New Item');
          $("#btn_saveupdate_item").html('Save');
        }
      })
    });
    $(document).on('click', '#btn_deleteitem', function(){
      var item_id=$(this).data("item_id");
      if(confirm("Are you sure you want to delete this?")){
        $.ajax({
          url: 'main-query/item_items_delete.php',
          method: 'POST',
          data: {item_id:item_id},
          success:function(data){
            $.notify({
                      icon: 'ui icon check',
                      message: data},
                      {type: 'success',timer: 200}
                    );
            $('#content').load('main-content/view_items.php');
          }
        })
      }
    });
    $(document).on('click','#btn_edititem',function(){
      var item_id=$(this).data("item_id");
      $.ajax({
        url: 'main-modal/add_edit_item_items_modal.php',
        method:"POST",
        data:{item_id:item_id},
        success:function(data){
            $('#modal-content').html(data);
            $('#myModal').modal('show');
            $("#modal-title").html('Update Item');
            $("#btn_saveupdate_item").html('Update');
        }
      })
    });

    $(document).on('click', '#btn_saveupdate_item', function(){
      switch ($("#modal-title").text()) {
        case 'Add New Item':
          if($('#item_id').val() == "" || $('#brand_name').val() == "" || $('#category_name').val() == ""
          || $('#branch_name').val() == "" || $('#serial_number').val() == "" || $('#status').val() == ""){
            $.notify({
                      icon: 'ui icon check',
                      message: "Please fill the form completely!"},
                      {type: 'success',timer: 200}
                    );
          }else{
            $.ajax({
              url: 'main-query/item_items_add.php',
              method:"POST",
              data:{item_id:$('#item_id').val(),
                    brand_name:$('#brand_name').val(),
                    category_name:$('#category_name').val(),
                    branch_name:$('#branch_name').val(),
                    serial_number:$('#serial_number').val(),
                    status:$('#status').val()},
              success:function(data){
                $.notify({
                          icon: 'ui icon check',
                          message: data},
                          {type: 'success',timer: 200}
                        );
                $('#content').load('main-content/view_items.php');
                $('#myModal').modal('hide');
              }
            });
          }
        break;
        case 'Update Item':
        if($('#item_id').val() == "" || $('#brand_name').val() == "" || $('#category_name').val() == ""
        || $('#branch_name').val() == "" || $('#serial_number').val() == "" || $('#status').val() == ""){
            $.notify({
                      icon: 'ui icon check',
                      message: "Please fill the form completely!"},
                      {type: 'success',timer: 200}
                    );
          }
          else
          {
              var old_item_id=$(this).data("item_id");
              $.ajax({
                url: 'main-query/item_items_update.php',
                method:"POST",
                data:{old_item_id:$('#old_item_id').val(),
                      item_id:$('#item_id').val(),
                      brand_name:$('#brand_name').val(),
                      category_name:$('#category_name').val(),
                      branch_name:$('#branch_name').val(),
                      serial_number:$('#serial_number').val(),
                      status:$('#status').val()},
                success:function(data)
                {
                  $.notify({
                            icon: 'ui icon check',
                            message: data},
                            {type: 'success',timer: 200}
                          );
                  $('#content').load('main-content/view_items.php');
                  $('#myModal').modal('hide');
                }
              });

          }
        break;
        default:
          // NO DEFAULT ACTION
        break;
      }
    });
  </script>

</html>
