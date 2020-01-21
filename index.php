<?php include('layout/header.php');?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

	<?php include('layout/header_bar.php');?>
 
	<!-- Left side column. contains the sidebar -->
	<?php include('layout/sidebar.php');?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <?php include('layout/blank.php');?>
	</div>
	<!-- /.content-wrapper -->

	<?php include('layout/footer.php');?>
 
	<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
  
</div>

<!-- ./wrapper -->
<?php include('layout/bottom_js.php');?>

</body>
<script>
  var ind;
  var opt;
  var con;
  //var link_url;//use for listing pag when click menu
  var sData=$('#txt_s');
  var tData=$('#txt_total_data');
  var total_record=$('#txt_total_record');
  var show_record=$('#my-select');
  var userID=$('#txtUserID').val();
  var loginName=$('#txtLgName').val();
  var userPhoto=$('#txtUserPhoto').val();
  var userRole=$('#txtUserRole').val();
  var userStatus=$('#txtStatus').val();
  var tbl=['get-user','get-role',''];
  var frm=['frm-user','frm-role','frm-assign-role'];
  var contentWrapper = $('.content-wrapper');

  $(document).ready(function(){
    
    // Listing Page View
    $('.mainMenu').on('click','ul li',function(){
      var eThis=$(this);
      opt=eThis.data('opt');
      contentWrapper.find('.content-header').show();
      contentWrapper.find('.content').show();
      contentWrapper.find('.content-header .navigate').text(eThis.text());
      contentWrapper.find('.content .box-title').text(eThis.text() + ' Listing');
      contentWrapper.find('.mainNavigation').show();
      $('#btn-add-new').show();
      contentWrapper.find('.searchBox').show();

    
      con="id>0";
      if(opt==0){
        con="users.uid>0 AND status=1";
      }else if(opt==1){
        con="roles.rid>0 AND status=1";
      }else if(opt==2){
        con="status=1";
        $('#btn-add-new').hide();
        contentWrapper.find('.searchBox').hide();
        contentWrapper.find('.mainNavigation').hide();
        $('#tblData').html('');
      }else if(opt==3){
        con="status=1";
        $('#btn-add-new').hide();
        contentWrapper.find('.searchBox').hide();
        contentWrapper.find('.mainNavigation').hide();
        $('#tblData').html('');
      }else if(opt==4){
        con="status=1";
        $('#btn-add-new').hide();
        contentWrapper.find('.searchBox').hide();
        contentWrapper.find('.mainNavigation').hide();
        $('#tblData').html('');
      }else if(opt==5){
        con="status=1";
      }else if(opt==6){
        con="status=1";
      }else if(opt==7){
        con="status=1";
      }else if(opt==8){
        con="status=1";
      }else if(opt==9){
        con="status=1";
      }else if(opt==10){
        con="status=1";
      }
      
      $.ajax({
        url:'action/'+tbl[opt]+'.php',
        type:'POST',
        data:{s:0,con:con,opt:opt,show_record:show_record.val()},
        cache:false,
        success:function(data)
        {
          $('#tblData').html(data);
          //sData.val(2);
        }
      });

      // //count data
      // $.ajax({
      //   url:'action/countdata.php',
      //   type:'POST',
      //   data:{opt:opt,con:con},
      //   //contentType:false,
      //   cache:false,
      //   //processData:false,
      //   dataType:"json",
      //   success:function(data)
      //   {
      //     //alert(data.total);
      //     tData.val(data.total-2);
      //     sData.val(0);
      //   }
      // });

      
    });
  });
</script>
</html>
