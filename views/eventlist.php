<?php 
$records = getBookingRecords();
$utype = '';
$type = $_SESSION['calendar_fd_user']['type'];
if($type == 'admin') {
  $utype = 'on';
}
?>

<div class="col-md-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Event List</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tr>
          <th style="width: 10px">EventID</th>
          <th>Name</th>
          <th>Type</th>
          <th>Department</th>
          <th>Date</th>
          <th>Venue</th>
          <th>Reports</th>
          <th>Faculty</th>
          <th>Phone</th>
          <th>Email</th>
        </tr>
        <?php
    $idx = 1;
    foreach($records as $rec) {
      extract($rec);
    $stat = '';
    ?>
         <!-- Delete/modify action deleted -->
        <tr>
          <td><?php echo $no; ?></td>
          <td style="width: 200px"><?php echo $eName; ?></td>
          <td><?php echo $eType; ?></td>
          <td><?php echo $eDepartment; ?></td>
          <td style="width: 450px"><?php echo $eDate; ?></td>
          <td><?php echo $eVenue; ?></td>
          <td style="width: 450px"><a href=<?php echo $eReports; ?>><?php echo $eReports; ?></a></td>
          <td style="width: 600px"><?php echo $eFaculty; ?></td>
          <td><?php echo $ePhone; ?></td>
          <td><?php echo $eEmail; ?></td>
      <?php if($utype == 'on') { ?>
      <?php } ?>
        </tr>
        <?php } ?>
      </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
      
  <ul class="pagination pagination-sm no-margin pull-right">
      <li><a href="#">&laquo;</a></li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">&raquo;</a></li>
    </ul>
  
      <?php echo generatePagination(); ?> </div>
  </div>
  <!-- /.box -->
</div>

<script language="javascript">
function approve(userId) {
  if(confirm('Are you sure you wants to Approve it ?')) {
    window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=regConfirm&action=approve&userId='+userId;
  }
}
function decline(userId) {
  if(confirm('Are you sure you wants to Decline the Booking ?')) {
    window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=regConfirm&action=denide&userId='+userId;
  }
}
function deleteUser(userId) {
  if(confirm('Deleting user will also delete it\'s booking from calendar.\n\nAre you sure you want to priceed ?')) {
    window.location.href = '<?php echo WEB_ROOT; ?>api/process.php?cmd=delete&userId='+userId;
  }
}

</script>
