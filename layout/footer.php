<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.1
    </div>
    <strong>Copyright © 07-08-2019 <a href="#">KC-Developer Team.</a></strong> All rights reserved. 

    <!-- Start Get User Login Info And Insert Into Textbox Control -->
    <input type="hidden" name="txt_s" id="txt_s" value="0" style="">
    <input type="hidden" name="txt_total_data" id="txt_total_data" value="0" style="">
    <input type="hidden" name="txtUserID" id="txtUserID" value="<?php echo $userID; ?>">
    <input type="hidden" name="txtLgName" id="txtLgName" value="<?php echo $loginName; ?>">
    <input type="hidden" name="txtUserPhoto" id="txtUserPhoto" value="<?php echo $userPhoto; ?>">
    <input type="hidden" name="txtUserRole" id="txtUserRole" value="<?php echo $userRole; ?>">
    <input type="hidden" name="txtStatus" id="txtStatus" value="<?php echo $userStatus; ?>">
    <!-- End Get User Login Info -->
</footer>