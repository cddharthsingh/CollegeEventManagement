<?php 
$records = getUserRecords();
$utype = '';
$type = $_SESSION['calendar_fd_user']['type'];
if($type == 'admin' || $type == 'teacher') {
	$utype = 'on';
}
?>

<div class="col-md-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">User details</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tr>
          <th style="width: 10px">#</th>
          <th>Name</th> <!-- name -->
          <th>Email</th>
          <th>Phone</th>
          <th>User Role</th>
          <th style="width: 100px">Status</th>
          <?php if($utype == 'on') { ?>
		  <th>Action</th>
		  <?php } ?>
        </tr>
        <?php
	  $idx = 1;
	  foreach($records as $rec) {
	  	extract($rec);
		$stat = '';
		if($status == "active") {$stat = 'success';}
		else if($status == "lock") {$stat = 'warning';}
		else if($status == "inactive") {$stat = 'warning';}
		else if($status == "delete") {$stat = 'danger';}
		?>
        <tr>
          <td><?php echo $idx++; ?></td>
          <td><a href="<?php echo WEB_ROOT; ?>views/?v=DEPT_EVENTS&ID=<?php echo $user_id; ?>"><?php echo strtoupper($user_name); ?></a></td>
          <td><?php echo $user_email; ?></td>
          <td><?php echo $user_phone; ?></td>
         
          <td>
		  <i class="fa <?php echo $type == 'teacher' ? 'fa-user' : 'fa-users' ; ?>" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo strtoupper($type); ?></i></td>
          <td><span class="label label-<?php echo $stat; ?>"><?php echo strtoupper($status); ?></span></td>
          <?php if($type == 'student') { ?>
		  <td><?php if($status == "active") {?>
            <!-- <a href="javascript:status('<?php echo $user_id ?>', 'inactive');">Inactive</a>&nbsp;/
			&nbsp;<a href="javascript:status('<?php echo $user_id ?>', 'lock');">Account Lock</a>&nbsp;/ -->
			&nbsp;<a href="javascript:status('<?php echo $user_id ?>', 'delete');">Delete</a>
            <?php }
            else { ?>
              Delete
<!-- 			         <a href="javascript:status('<?php echo $user_id ?>', 'active');">Active</a> -->
			         <?php }//else ?>
          </td>
		  <?php }?>
        </tr>
        <?php } ?>
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
	
	<?php 
	$type = $_SESSION['calendar_fd_user']['type'];
	if($type == 'admin') {
	?>
	<button type="button" class="btn btn-info" onclick="javascript:createUserForm();"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Create a new User</button>
	<?php 
	}
	?>
      <!--
	<ul class="pagination pagination-sm no-margin pull-right">
      <li><a href="#">&laquo;</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">&raquo;</a></li>
    </ul>
	-->
      <?php echo generatePagination(); ?> </div>
  </div>
  <!-- /.box -->
</div>

<script language="javascript">
function createUserForm() {
	window.location.href = '<?php echo WEB_ROOT; ?>views/?v=CREATE';
}
function status(userId, status) {
	if(confirm('Are you sure you wants to ' + status+ ' it ?')) {
		window.location.href = '<?php echo WEB_ROOT; ?>views/process.php?cmd=change&action='+ status +'&userId='+userId;
	}
}


</script>
