<?php 

require_once 'Booking.php';
require_once '../library/config.php';
require_once '../library/mail.php';

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch($cmd) {
	
	case 'book':
		bookCalendar();
	break;
		
	case 'holiday':
		addHoliday();
	break;
	
	case 'hdelete':
		deleteHoliday();
	break;
		
	case 'calview':
		calendarView();
	break;

	case 'regConfirm':
		regConfirm();
	break;
			
	case 'delete':
		regDelete();
	break;
	
	case 'user':
		userDetails();
	break;
	
	default :
	break;
}

function addHoliday() {
	$date 		= $_POST['date'];
	$reason 	= $_POST['reason'];	
	
	$errorMessage = '';
	
	$sql 	= "SELECT * FROM tbl_holidays WHERE date = '$date'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) > 0) {
		$errorMessage = 'Holiday already exist in record.';
		header('Location: ../views/?v=HOLY&err=' . urlencode($errorMessage));
		exit();
	}
	else {
		$sql = "INSERT INTO tbl_holidays (date, reason, bdate)
				VALUES ('$date', '$reason', NOW())";	
		dbQuery($sql);
		$msg = 'Holiday successfully added on calendar.';
		header('Location: ../views/?v=HOLY&msg=' . urlencode($msg));
		exit();
	}
}

function bookCalendar() {
	$deptID 		= $_POST['deptID'];
	// $userId		= (int)$_POST['userId'];
	$eventTypeID 	= $_POST['eventTypeID'];
	$rdate		= $_POST['rdate'];
	$rtime		= $_POST['rtime'];
	$eventName  = $_POST['eventName'];
	$venue		= $_POST['venue'];
	$faculty 	= $_POST['faculty'];
	$phone 		= $_POST['phone'];
	$email 		= $_POST['email'];
	$numberAttendees = $_POST['numberAttendees'];
	$link		= $_POST['link'];
	$bkdate		= $rdate. ' '. $rtime;
	// $ucount		= $_POST['ucount'];
	
	//TODO first check if that date has a holiday
	$hsql	= "SELECT * FROM tbl_holidays WHERE date = '$rdate'";
	$hresult = dbQuery($hsql);
	if (dbNumRows($hresult) > 0) {
		$errorMessage = 'You can not book any event on Holiday. Please try another day.';
		header('Location: ../views/?v=DB&err=' . urlencode($errorMessage));
		exit();
	}
	
	/*
	$sql = "INSERT INTO tbl_users (name, address, phone, email, bdate)
			VALUES ('$name', '$address', '$phone', '$email', NOW())";	
	dbQuery($sql);
	$insert_id = dbInsertId();
	*/
	
	$sql = "INSERT INTO eventlist (deptID, eventTypeID, eventDate, eventTime, eventName, venue, faculty, facultyPhone, facultyEmail, numberAttendees, link, bdate) 
			VALUES ('$deptID', '$eventTypeID', '$rdate', '$rtime', '$eventName', '$venue','$faculty', '$phone', '$email', '$numberAttendees', '$link', '$bkdate')";
	dbQuery($sql);
	
	//send email on registration confirmation
	// $bodymsg = "User $deptName booked the date slot on $bkdate. Requesting you to please take further action on user booking.<br/>Mbr/>Tousif Khan";
	// $data = array('to' => 'tousifkhan510@gmail.com', 'sub' => 'Booking on $rdate.', 'msg' => $bodymsg);
	//send_email($data);
	header('Location: ../index.php?msg=' . urlencode('Event successfully registered.'));
	exit();
}

function regConfirm() {
	$userId		= $_GET['userId'];
	$action 	= $_GET['action'];
	$stat		= ($action == 'approve') ? 'APPROVED' : 'DENIED';
	
	$sql		= "UPDATE tbl_reservations SET status = '$stat' WHERE uid = $userId";
	dbQuery($sql);
	
	//send email now.
	$data = array();
	
	header('Location: ../views/?v=DB&msg=' . urlencode('Reservation status successfully changed.'));
	exit();
}

function regDelete() {
	$userId	= $_GET['userId'];
	$sql1	= "DELETE FROM tbl_reservations WHERE uid = $userId";
	dbQuery($sql1);
	$sql2	= "DELETE FROM tbl_users WHERE id = $userId";
	dbQuery($sql2);
	
	header('Location: ../views/?v=LIST&msg=' . urlencode('User record successfully deleted.'));
	exit();
}

function deleteHoliday() {
	$holyId	= $_GET['hId'];
	$dsql	= "DELETE FROM tbl_holidays WHERE id = $holyId";
	dbQuery($dsql);
	header('Location: ../views/?v=HOLY&msg=' . urlencode('Holiday record successfully deleted.'));
	exit();
}

function calendarView() {
	$start 	= $_POST['start'];
	//$sdate	= date("Y-m-d\TH:i\Z", time($start));
	$end 	= $_POST['end'];
	//$edate	= date("Y-m-d\TH:i\Z", time($end));
	$bookings = array();
	$sql	= "SELECT l.eventName AS eventName, l.eventID AS eventID, l.deptID as deptID, l.bdate, u.name as department, u.id
			   FROM eventlist l, tbl_users u 
			   WHERE u.id = l.deptID  
			   AND (l.bdate BETWEEN '$start' AND '$end')";
	//AND r.status = 'APPROVED'
	$result = dbQuery($sql);
	while($row = dbFetchAssoc($result)) {
		extract($row);
		$book = new Booking();
		$book->title = $eventName;
		$book->start = $bdate; 
		$bgClr = '#00cc00';//pending
		$book->backgroundColor = $bgClr; //#7FFF00 -> green, #ff0000 red, #f39c12 -> pending 
		$book->borderColor = $bgClr;
		$book->url = WEB_ROOT . 'views/?v=USER&eventID='.$eventID;
		$bookings[] = $book; 
	}
	//execute SQLs to get the Holiday blocking days List within the limit of start, end date;
	$hsql	= "SELECT * FROM tbl_holidays 
			   WHERE (date BETWEEN '$start' AND '$end')";
	$hresult = dbQuery($hsql);
	while($hrow = dbFetchAssoc($hresult)) {	
		extract($hrow);	   
		$b = new Booking();
		$b->block = true;
		$b->title = $reason;
		$b->start = $date;
		$b->allDay = true; 
		$b->borderColor = '#F0F0F0';
		$b->className = 'fc-disabled';
		$bookings[] = $b;
	}//while
	echo json_encode($bookings);
}

function userDetails() {
	$userId	= $_GET['userId'];
	$hsql	= "SELECT * FROM tbl_users WHERE id = $userId";
	$hresult = dbQuery($hsql);
	$user = array();
	while($hrow = dbFetchAssoc($hresult)) {	
		extract($hrow);
		$user['user_id'] = $id;
		$user['address'] = $address;
		$user['phone_no'] = $phone;
		$user['email'] = $email;
	}//while
	echo json_encode($user);
}


?>