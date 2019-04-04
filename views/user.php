<?php 
$eventID = (isset($_GET['eventID']) && $_GET['eventID'] != '') ? $_GET['eventID'] : 0;
$usql	= "SELECT l.eventID, l.deptID, l.eventTypeID, l.eventDate, l.eventTime, l.eventName, l.venue, l.faculty, l.facultyPhone, l.facultyEmail, l.numberAttendees, l.bdate, l.link, d.name, e.eventType FROM eventlist l, tbl_users d, event_type e WHERE l.eventID = $eventID and l.deptID=d.id and  e.eventTypeID = l.eventTypeID";
$res 	= dbQuery($usql);
while($row = dbFetchAssoc($res)) {
	extract($row);
	$stat = '';
  	// if($status == "active") {$stat = 'success';}
	// else if($status == "lock") {$stat = 'warning';}
	// else if($status == "inactive") {$stat = 'warning';}
	// else if($status == "delete") {$stat = 'danger';}
?>

<div class="col-md-9">
  <div class="box box-solid">
    <div class="box-header with-border"> <i class="fa fa-text-width"></i>
      <h3 class="box-title">Event Details</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <dl class="dl-horizontal">
        <dt>Name of the Event</dt>
        <dd><?php echo $eventName; ?></dd>
        
<!-- my list starts from here -->
    <dt>Department</dt>
        <dd><?php echo $name; ?></dd>

    <dt>Type of Event</dt>
        <dd><?php echo $eventType; ?></dd>
      
    <dt>Date and Time</dt>
        <dd><?php echo $bdate; ?></dd>

    <dt>Venue</dt>
        <dd><?php echo $venue; ?></dd>

    <dt>Faculty Incharge</dt>
        <dd><?php echo $faculty; ?></dd>

    <dt>Faculty Contact Number</dt>
        <dd><?php echo $facultyPhone; ?></dd>

    <dt>Faculty EmailID</dt>
       <dd><?php echo $facultyEmail; ?></dd>

    <dt>Number of Attendees</dt>
        <dd><?php echo $numberAttendees; ?></dd>

    <dt>Reports and Photos</dt>
        <dd><a href="<?php echo $link; ?>"  target="_blank"><?php echo $link; ?></a></dd>


<!-- my list ends here -->        
		
      </dl>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<?php 
}
?>
