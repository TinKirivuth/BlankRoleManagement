<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="padding-top: 10px;">
        Dashboard
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb" >
        <!--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>-->
        <!-- <li class="active"><a href="#"><i class="fa fa-plus" style="font-weight: 600;font-size: 20px;padding:5px 10px;border:1px solid grey;"></i><a></li> -->
        	<a href="#" class="btn btn-default btn-flat">Add New</a>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      	<!-- Default box -->
      	<div class="box">
	        <div class="box-header with-border">
	          <h3 class="box-title">Role Assignment</h3>

	          <div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
	              <i class="fa fa-minus"></i></button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	              <i class="fa fa-times"></i></button>
	          </div>
	        </div>
	        <div class="box-body permission">
            <div class="col-md-12">
              <div class="col-md-1"></div>
              <div class="col-md-10" style="padding: 2px;">
                <div class="form-group">
                  <label>Select Role</label>
                  <select class="form-control" id="txt_role">
                    <?php $pk->get_role_to_select();?>
                  </select>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>

	          <div class="col-md-1"></div>

            <div class="col-md-5">
              <div class="box box-solid" style="border:1px solid #eee;border-bottom: none;">
                <div class="box-header with-border" style="border-top-left-radius: 2px;border-top-right-radius: 3px;">
                  <i class="fa fa-text-width"></i>

                  <h3 class="box-title">System Menu</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul style="list-style: none;" class="systemMenu">
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-5">
              <div class="box box-solid" style="border:1px solid #eee;border-bottom: none;">
                <div class="box-header with-border" style="border-top-left-radius: 2px;border-top-right-radius: 3px;">
                  <i class="fa fa-text-width"></i>

                  <h3 class="box-title">Menu In Roles</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul style="list-style: none;" class="menuInRole">
                    
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-1"></div>
	        </div>





          <div class="box-body permission">
            <div class="col-md-12">
              <div class="col-md-1"></div>
              <div class="col-md-10" style="padding: 2px;">
                <div class="form-group">
                  <div class="form-group">
                    <label>Role Name</label>
                    <input type="text" class="form-control" name="txt_role_name" id="txt_role_name" placeholder="Enter Name." required>
                  </div>
                  <div class="form-group">
                    <label>Note</label>
                    <textarea class="form-control" rows="3" name="txt_note" id="txt_note" placeholder="Enter Note" required></textarea>
                  </div>
                  <a href="#" class="btnSaveRole">Save Role</a>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>



            <div class="col-md-12">
              <div class="col-md-1"></div>
              <div class="col-md-10" style="padding: 2px;">
                <div class="form-group">
                  <label>Select Role</label>
                  <select class="form-control" id="txt_role1">
                    <?php $pk->get_role_to_select();?>
                  </select>
                </div>
              </div>
              <div class="col-md-1"></div>
            </div>



            <div class="col-md-1"></div>

            <div class="col-md-5">
              <div class="box box-solid" style="border:1px solid #eee;border-bottom: none;">
                <div class="box-header with-border" style="border-top-left-radius: 2px;border-top-right-radius: 3px;">
                  <i class="fa fa-text-width"></i>

                  <h3 class="box-title">System User</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul style="list-style: none;" class="systemUser">
                    <?php $pk->get_system_user(); ?>
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-5">
              <div class="box box-solid" style="border:1px solid #eee;border-bottom: none;">
                <div class="box-header with-border" style="border-top-left-radius: 2px;border-top-right-radius: 3px;">
                  <i class="fa fa-text-width"></i>

                  <h3 class="box-title">User In Roles</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul style="list-style: none;" class="userInRole">
                    
                  </ul>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>

            <div class="col-md-1"></div>
          </div>
	        <!-- /.box-body -->
	        <div class="box-footer">
	          Please Follow Instruction.
	        </div>
	        <!-- /.box-footer-->
      	</div>
      	<!-- /.box -->

    </section>
<!-- /.content -->