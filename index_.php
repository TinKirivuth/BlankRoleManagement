<!-- Header -->
<?php include('layout/header.php');?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
	<?php
    	include('layout/header_bar.php');
    ?>
 
  	<!-- Left side column. contains the sidebar -->
  	<?php
    	include('layout/sidebar.php');
    ?>

  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
	    <?php
        include('layout/blank.php');
      ?>
  	</div>
  	<!-- /.content-wrapper -->

  	<?php
    	include('layout/footer.php');
    ?>
 
	<!-- Add the sidebar's background. This div must be placed
	immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>

  

</div>
<!-- ./wrapper -->
<?php
  include('layout/bottom_js.php');
?>
</body>
<script>
  $(document).ready(function(){
    var menuPermission='<li data-opt="1000" data-mid="0" data-main="1"><a href="#"><i class="fa fa-circle-o"></i> Admin Tools</a></li><li data-opt="1001" data-mid="0" data-main="1"><a href="#"><i class="fa fa-circle-o"></i> Operations</a></li><li data-opt="0" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Users</a></li><li data-opt="1" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Roles</a></li><li data-opt="2" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Role Assignment</a></li><li data-opt="3" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Owner</a></li><li data-opt="4" data-mid="1000" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Settings</a></li><li data-opt="5" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Categories</a></li><li data-opt="6" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Unit Types</a></li><li data-opt="7" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Groups</a></li><li data-opt="8" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Assets</a></li><li data-opt="9" data-mid="1001" data-main="0"><a href="#"><i class="fa fa-circle-o"></i> Supliers</a></li>';

    // Select Menu Avaliable For Role
    $('body').on('change','#txt_role',function(){
      $('.permission').find('.systemMenu').html(menuPermission);
      var roleId=$(this).val();
      if (roleId==0){
        $('.permission').find('.menuInRole').html(''); 
        return;
      }
      $.ajax({
        url:'action/get-permission.php',
        type:'POST',
        data:{rid:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.menuInRole').html(data);
          var li1=$('.systemMenu').find('li');
          var li2=$('.menuInRole').find('li');
          for(i=0;i<li2.length;i++){
            for(x=0;x<li1.length;x++){
              if(li2.eq(i).text()==li1.eq(x).text()){
                li1.eq(x).remove();
              }
            }
          }
        }
      });     
    });

    // Select System User
    $('body').on('change', '#txt_role1', function(){
      // $('.permission').find('.systemUser').html(menuPermission);
      var roleId=$(this).val();
      if(roleId==0){
        $('.permission').find('.userInRole').html('');
        return;
      }
      $.ajax({
        url:'action/get-system-user-by-role.php',
        type:'POST',
        data:{rid:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.userInRole').html(data);
        }
      }); 
    });
    
    // Add menu Permission to role
    $('body').on('click','.permission .systemMenu li',function(){
      var menuInRole=$('.menuInRole');
      var eThis=$(this);
      var menuId=eThis.data('opt');
      var mainId=eThis.data('mid');
      var main=eThis.data('main');
      var menuName=eThis.text().trim();
      var roleId=$('.permission').find('#txt_role').val();
      $.ajax({
        url:'action/add-permission.php',
        type:'POST',
        data:{menuId:menuId,roleId:roleId,menuName:menuName,mainId:mainId,main:main},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.menuInRole').append(eThis); 
        }
      });
    });

    //remove menu permission from role
    $('body').on('click','.permission .menuInRole li',function(){
      var systemMenu=$('.systemMenu');
      var eThis=$(this);
      var menuId=eThis.data('opt');
      var mainId=eThis.data('mid');
      var main=eThis.data('main');
      var menuName=eThis.text().trim();
      var roleId=$('.permission').find('#txt_role').val();
      $.ajax({
        url:'action/remove-permission.php',
        type:'POST',
        data:{menuId:menuId,roleId:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.systemMenu').append(eThis); 
        }
      });
    });

    // assign role to user
    $('body').on('click','.permission .systemUser li',function(){
      var userInRole=$('.userInRole');
      var eThis=$(this);
      var userId=eThis.data('uid');
      var roleId=$('.permission').find('#txt_role1').val();
      if (roleId==0){
        alert("please select role first if you want to assign.");
        return;
      }
      $.ajax({
        url:'action/assign-role-to-user.php',
        type:'POST',
        data:{uid:userId,rid:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.userInRole').append(eThis); 
        }
      });
    });

    // remove role from user
    $('body').on('click','.permission .userInRole li',function(){
      var systemuser=$('.systemUser');
      var eThis=$(this);
      var userId=eThis.data('uid');
      var roleId=$('.permission').find('#txt_role1').val();
      $.ajax({
        url:'action/remove-role-from-user.php',
        type:'POST',
        data:{uid:userId,rid:roleId},
        //contentType:false,
        cache:false,
        //processData:false,
        //dataType:"json",
        success:function(data)
        {
          $('.permission').find('.systemUser').append(eThis); 
        }
      });
    });

    // Save Role
    $('body').on('click', '.btnSaveRole', function(){
      var rname=$('#txt_role_name');
      var note=$('#txt_note');
      if(rname.val()==''){
        alert("Role Name is Required.");
        return;
      }
      $.ajax({
        url:'action/save-role.php',
        type:'POST',
        data:{rname:rname.val(),note:note.val()},
        //contentType:false,
        cache:false,
        //processData:false,
        dataType:"json",
        success:function(data)
        {
          alert(data.message); 
        }
      });
    });

    // Listing Page View
    $('.mainMenu').on('click','ul li',function(){
      var eThis=$(this);
      opt=eThis.data('opt');
      // $('.mainMenu').find('ul li').css({'color':'#fff'});
      // eThis.css({'color':'yellow'});
      // $('.bg1').text(eThis.text());
      // $('#btn-new').show();

      // con="id>0";
      // if(opt==1){
      //   con="tbl_news.id>0";
      // }
      
      
      // $.ajax({
      //   url:'action/'+tbl[opt],
      //   type:'POST',
      //   data:{s:0,con:con},
      //   //contentType:false,
      //   cache:false,
      //   //processData:false,
      //   //dataType:"json",
      //   success:function(data)
      //   {
      //     $('#tblData').html(data);
      //     //sData.val(2);
      //   }
      // });
      alert(opt);

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
