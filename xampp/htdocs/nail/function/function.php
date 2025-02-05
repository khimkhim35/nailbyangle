<?php
error_reporting(0);

//เชื่อต่อ Database
$con = mysqli_connect("localhost","root","","nail");
$con->set_charset("utf8");

function checkLogin($username,$password){
	$data = array();
	global $con;

	$res = mysqli_query($con,"select * from users where username = '".$username."' and password='".$password."' ");
	
	while($row = mysqli_fetch_array($res)) {
		$data['id'] = $row['id'];
		$data['role'] = $row['role'];
	}
	if (!empty($data)) {
		session_start();
		$id = $data['id'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['role'] = $data['role'];

		echo ("<script language='JavaScript'>
			window.location.href='index.php';
			</script>");
	}else{
		echo "<script type='text/javascript'>alert('ไม่สามารถเข้าสู่ระบบได้');</script>";
	}
	
	mysqli_close($con);

}

function formatDateFull($date){
	if($date=="0000-00-00"){
		return "";
	}
	if($date=="")
		return $date;
	$raw_date = explode("-", $date);
	return  $raw_date[2] . "/" . $raw_date[1] . "/" . $raw_date[0];
}

function formatTime($time){
	if($time=="00:00:00"){
		return "";
	}
	if($time=="")
		return $time;
	$cTime = substr($time, 0,5);
	//$raw_date = explode("-", $date);
	return  $cTime;
}


function logout(){
	session_start();
	session_unset();
	session_destroy();

	echo ("<script language='JavaScript'>
		window.location.href='index.php';
		</script>");
	exit();
}

function getUser($id){

	global $con;

	$sql = "SELECT * FROM users WHERE id = '".$id."'";
	$res = mysqli_query($con,$sql);
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function getCheckEmail($email){

	global $con;

	$res = mysqli_query($con,"SELECT COUNT(*) as numCount FROM users WHERE email = '".$email."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function saveRegister($username,$password,$firstname,$lastname,$email,$phone){
	
	global $con;

	$sql = "INSERT INTO users (username, password, address, email, phone, gender, status, role) VALUES('".$username."','".$password."','".$address."','".$email."','".$phone."','".$gender."','".$status."','".$role."')";
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='login.php';
		</script>"); 
	
}

function saveAdmin($username,$password,$firstname,$lastname,$email,$phone,$role){
	
	
	global $con;

	$sql = "INSERT INTO users (username, password, firstname, lastname, email, phone, role) VALUES('".$username."','".$password."','".$firstname."','".$lastname."','".$email."','".$phone."','".$role."')";
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_admin.php';
		</script>"); 
	
}

function editAdmin($id,$username,$password,$firstname,$lastname,$email,$phone,$role){

	global $con;

	$sql="UPDATE users SET username='".$username."',password='".$password."',firstname='".$firstname."',lastname='".$lastname."',email='".$email."',phone='".$phone."',role='".$role."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_admin.php';
		</script>"); 
	
}

function saveMember($username,$password,$firstname,$lastname,$email,$phone,$role){
	
	
	global $con;

	$sql = "INSERT INTO users (username, password, firstname, lastname, email, phone, role) VALUES('".$username."','".$password."','".$firstname."','".$lastname."','".$email."','".$phone."','".$role."')";
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_member.php';
		</script>"); 
	
}

function editMember($id,$username,$password,$firstname,$lastname,$email,$phone,$role){

	global $con;

	$sql="UPDATE users SET username='".$username."',password='".$password."',firstname='".$firstname."',lastname='".$lastname."',email='".$email."',phone='".$phone."',role='".$role."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);

	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_member.php';
		</script>"); 
	
}

function editProfile($id,$username,$password,$firstname,$lastname,$email,$phone){

	global $con;

	$sql="UPDATE users SET username='".$username."',password='".$password."',firstname='".$firstname."',lastname='".$lastname."',email='".$email."',phone='".$phone."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='profile.php';
		</script>"); 
	
}

function deleteAdmin($id){
	global $con;

	mysqli_query($con,"DELETE FROM users WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		window.location.href='manage_admin.php';
		</script>"); 

}

function deleteMember($id){
	global $con;

	mysqli_query($con,"DELETE FROM users WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		window.location.href='manage_member.php';
		</script>"); 

}

function getAllAdmin(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM users WHERE role = '1' ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'username' => $row['username'],
			'password' => $row['password'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'email' => $row['email'],
			'phone' => $row['phone'],
			'role' => $row['role']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getAllMember(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM users WHERE role = '2' ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'username' => $row['username'],
			'password' => $row['password'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'email' => $row['email'],
			'phone' => $row['phone'],
			'role' => $row['role']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getAllUserInRole($role){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM users WHERE role = '".$role."' ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'username' => $row['username'],
			'password' => $row['password'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'email' => $row['email'],
			'phone' => $row['phone'],
			'role' => $row['role']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentUser($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM users WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function saveInformation($users_id,$topic,$info_detail,$date_create,$info_image){
	
	
	global $con;

	if($info_image != null){
		if(move_uploaded_file($_FILES["info_image"]["tmp_name"],"images/information/".$_FILES["info_image"]["name"]))
		{

			$sql = "INSERT INTO informations (users_id, topic, info_detail, date_create, info_image) VALUES('".$users_id."','".$topic."','".$info_detail."','".$date_create."','".$_FILES["info_image"]["name"]."')";
		}
	}else{

		$sql = "INSERT INTO informations (users_id, topic, info_detail, date_create) VALUES('".$users_id."','".$topic."','".$info_detail."','".$date_create."')";
	}
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_information.php';
		</script>"); 
	
}

function editInformation($id,$users_id,$topic,$info_detail,$date_create,$info_image){

	global $con;

	if($info_image != null){
		if(move_uploaded_file($_FILES["info_image"]["tmp_name"],"images/information/".$_FILES["info_image"]["name"]))
		{
			$sql="UPDATE informations SET users_id='".$users_id."',topic='".$topic."',info_detail='".$info_detail."',date_create='".$date_create."',info_image='".$_FILES["info_image"]["name"]."' WHERE id = '".$id."'";
		}
	}else{
		$sql="UPDATE informations SET users_id='".$users_id."',topic='".$topic."',info_detail='".$info_detail."',date_create='".$date_create."' WHERE id = '".$id."'";

	}
	mysqli_query($con,$sql);
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_information.php';
		</script>"); 
	
}

function deleteInformation($id){
	global $con;

	mysqli_query($con,"DELETE FROM informations WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		window.location.href='manage_information.php';
		</script>"); 

}

function getAllInformation(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM informations ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'users_id' => $row['users_id'],
			'topic' => $row['topic'],
			'info_detail' => $row['info_detail'],
			'date_create' => $row['date_create'],
			'info_image' => $row['info_image']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentInformation($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM informations WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function saveService($ser_name,$ser_detail,$ser_price,$ser_deposit,$ser_style,$ser_image){

	global $con;

	if($ser_image != null){
		if(move_uploaded_file($_FILES["ser_image"]["tmp_name"],"images/service/".$_FILES["ser_image"]["name"]))
		{
			$sql = "INSERT INTO services (ser_name, ser_detail, ser_price, ser_deposit, ser_style, ser_image) VALUES('".$ser_name."','".$ser_detail."','".$ser_price."','".$ser_deposit."','".$ser_style."','".$_FILES["ser_image"]["name"]."')";
		}
	}else{
		$sql = "INSERT INTO services (ser_name, ser_detail, ser_price, ser_deposit, ser_style) VALUES('".$ser_name."','".$ser_detail."','".$ser_price."','".$ser_deposit."','".$ser_style."')";
	}
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_service.php';
		</script>"); 

}

function editService($id,$ser_name,$ser_detail,$ser_price,$ser_deposit,$ser_style,$ser_image){

	global $con;

	if($ser_image != null){
		if(move_uploaded_file($_FILES["ser_image"]["tmp_name"],"images/service/".$_FILES["ser_image"]["name"]))
		{
			$sql="UPDATE services SET ser_name='".$ser_name."',ser_detail='".$ser_detail."',ser_price='".$ser_price."',ser_deposit='".$ser_deposit."',ser_style='".$ser_style."',ser_image='".$_FILES["ser_image"]["name"]."' WHERE id = '".$id."'";
		}
	}else{
		$sql="UPDATE services SET ser_name='".$ser_name."',ser_detail='".$ser_detail."',ser_price='".$ser_price."',ser_deposit='".$ser_deposit."',ser_style='".$ser_style."' WHERE id = '".$id."'";

	}
	mysqli_query($con,$sql);
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_service.php';
		</script>"); 

}

function deleteService($id){
	global $con;

	mysqli_query($con,"DELETE FROM services WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		window.location.href='manage_service.php';
		</script>"); 

}

function getAllService(){
	global $con;

	$sql = "SELECT * FROM services ORDER BY id DESC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'ser_name' => $row['ser_name'],
			'ser_detail' => $row['ser_detail'],
			'ser_price' => $row['ser_price'],
			'ser_deposit' => $row['ser_deposit'],
			'ser_style' => $row['ser_style'],
			'ser_image' => $row['ser_image']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentService($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM services WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function saveStyle($sty_name,$sty_image){

	global $con;

	if($sty_image != null){
		if(move_uploaded_file($_FILES["sty_image"]["tmp_name"],"images/styles/".$_FILES["sty_image"]["name"]))
		{
			$sql = "INSERT INTO styles (sty_name, sty_image) VALUES('".$sty_name."','".$_FILES["sty_image"]["name"]."')";
		}
	}else{
		$sql = "INSERT INTO styles (sty_name) VALUES('".$sty_name."')";
	}
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_style.php';
		</script>"); 

}

function editStyle($id,$sty_name,$sty_image){

	global $con;

	if($sty_image != null){
		if(move_uploaded_file($_FILES["sty_image"]["tmp_name"],"images/styles/".$_FILES["sty_image"]["name"]))
		{
			$sql="UPDATE styles SET sty_name='".$sty_name."',sty_image='".$_FILES["sty_image"]["name"]."' WHERE id = '".$id."'";
		}
	}else{
		$sql="UPDATE styles SET sty_name='".$sty_name."' WHERE id = '".$id."'";

	}
	mysqli_query($con,$sql);
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_style.php';
		</script>"); 

}

function deleteStyle($id){
	global $con;

	mysqli_query($con,"DELETE FROM styles WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		window.location.href='manage_style.php';
		</script>"); 

}

function getAllStyle(){
	global $con;

	$sql = "SELECT * FROM styles ORDER BY id DESC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'sty_name' => $row['sty_name'],
			'sty_image' => $row['sty_image']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentStyle($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM styles WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function saveBooking($services_id,$users_id,$booking_name,$booking_phone,$booking_email,$booking_date,$booking_time,$styles_id){
	
	global $con;

	$arrDate1 = explode("/", $booking_date);
	$convert_booking_date = $arrDate1[2].'-'.$arrDate1[1].'-'.$arrDate1[0];

	$sql = "INSERT INTO bookings (users_id, services_id, styles_id, booking_name, booking_phone, booking_email, booking_date, booking_time, booking_status) VALUES('".$users_id."','".$services_id."','".$styles_id."','".$booking_name."','".$booking_phone."','".$booking_email."','".$convert_booking_date."','".$booking_time."','1')";
	mysqli_query($con,$sql);
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ส่งคำขอการจองเรียบร้อย');
		window.location.href='history_booking.php';
		</script>"); 
	
}

function cancelBooking($id){

	global $con;

	$sql="UPDATE bookings SET booking_status='0' WHERE id = '".$id."'";
	mysqli_query($con,$sql);
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('ยกเลิกการจองเรียบร้อย');
		window.location.href='history_booking.php';
		</script>"); 
	
}

function getAllUserBooking($users_id){
	global $con;

	$sql = "SELECT *,b.id as bid 
	FROM bookings b 
	LEFT JOIN services s ON b.services_id = s.id 
	LEFT JOIN styles y ON b.styles_id = y.id 
	LEFT JOIN users u ON b.users_id = u.id 
	WHERE b.users_id = '".$users_id."'
	ORDER BY b.id DESC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['bid'],
			'users_id' => $row['users_id'],
			'services_id' => $row['services_id'],
			'styles_id' => $row['styles_id'],
			'booking_name' => $row['booking_name'],
			'booking_phone' => $row['booking_phone'],
			'booking_email' => $row['booking_email'],
			'booking_date' => $row['booking_date'],
			'booking_time' => $row['booking_time'],
			'booking_status' => $row['booking_status'],
			'ser_name' => $row['ser_name'],
			'ser_detail' => $row['ser_detail'],
			'ser_price' => $row['ser_price'],
			'ser_deposit' => $row['ser_deposit'],
			'ser_style' => $row['ser_style'],
			'ser_image' => $row['ser_image'],
			'username' => $row['username'],
			'password' => $row['password'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'email' => $row['email'],
			'phone' => $row['phone']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getAllHistoryBooking(){
	global $con;

	$sql = "SELECT *,b.id as bid 
	FROM bookings b 
	LEFT JOIN services s ON b.services_id = s.id 
	LEFT JOIN styles y ON b.styles_id = y.id 
	LEFT JOIN users u ON b.users_id = u.id 
	ORDER BY b.id DESC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['bid'],
			'users_id' => $row['users_id'],
			'services_id' => $row['services_id'],
			'styles_id' => $row['styles_id'],
			'booking_name' => $row['booking_name'],
			'booking_phone' => $row['booking_phone'],
			'booking_email' => $row['booking_email'],
			'booking_date' => $row['booking_date'],
			'booking_time' => $row['booking_time'],
			'booking_status' => $row['booking_status'],
			'ser_name' => $row['ser_name'],
			'ser_detail' => $row['ser_detail'],
			'ser_price' => $row['ser_price'],
			'ser_deposit' => $row['ser_deposit'],
			'ser_style' => $row['ser_style'],
			'ser_image' => $row['ser_image'],
			'username' => $row['username'],
			'password' => $row['password'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'email' => $row['email'],
			'phone' => $row['phone']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentBooking($id){

	global $con;

	$sql = "SELECT *,b.id as bid 
	FROM bookings b 
	LEFT JOIN services s ON b.services_id = s.id 
	LEFT JOIN styles y ON b.styles_id = y.id 
	LEFT JOIN users u ON b.users_id = u.id 
	WHERE b.id = '".$id."'";

	$res = mysqli_query($con,$sql);
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function savePayment($bookings_id,$date_payment,$money,$slipt_image){

	global $con;

	$arrDate1 = explode("/", $date_payment);
	$convert_date_payment = $arrDate1[2].'-'.$arrDate1[1].'-'.$arrDate1[0];

	if($slipt_image != null){
		if(move_uploaded_file($_FILES["slipt_image"]["tmp_name"],"images/slipt/".$_FILES["slipt_image"]["name"]))
		{
			$sql = "INSERT INTO payments (bookings_id, date_payment, moneys, slipt_image) VALUES('".$bookings_id."','".$convert_date_payment."','".$money."','".$_FILES["slipt_image"]["name"]."')";
		}
	}
	mysqli_query($con,$sql);

	$sql_up = "UPDATE bookings SET booking_status='2' WHERE id = '".$bookings_id."'";
	mysqli_query($con,$sql_up);

	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ส่งหลักฐานการชำระเรียบร้อย');
		window.location.href='history_booking.php';
		</script>"); 

}

function getCheckPaymentAmount(){

	global $con;

	$sql = "SELECT COUNT(*) as numCount FROM bookings WHERE booking_status = '2'";

	$res = mysqli_query($con,$sql);
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function getCheckQueueAmount(){

	global $con;

	$sql = "SELECT COUNT(*) as numCount FROM bookings WHERE booking_status = '3'";

	$res = mysqli_query($con,$sql);
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function getAllCheckPayment(){
	global $con;

	$sql = "SELECT *,b.id as bid 
	FROM bookings b 
	LEFT JOIN services s ON b.services_id = s.id 
	LEFT JOIN styles y ON b.styles_id = y.id 
	LEFT JOIN users u ON b.users_id = u.id 
	WHERE b.booking_status = '2'
	ORDER BY b.id DESC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['bid'],
			'users_id' => $row['users_id'],
			'services_id' => $row['services_id'],
			'styles_id' => $row['styles_id'],
			'booking_name' => $row['booking_name'],
			'booking_phone' => $row['booking_phone'],
			'booking_email' => $row['booking_email'],
			'booking_date' => $row['booking_date'],
			'booking_time' => $row['booking_time'],
			'booking_status' => $row['booking_status'],
			'ser_name' => $row['ser_name'],
			'ser_detail' => $row['ser_detail'],
			'ser_price' => $row['ser_price'],
			'ser_deposit' => $row['ser_deposit'],
			'ser_style' => $row['ser_style'],
			'ser_image' => $row['ser_image'],
			'username' => $row['username'],
			'password' => $row['password'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'email' => $row['email'],
			'phone' => $row['phone']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getAllCheckQueue(){
	global $con;

	$sql = "SELECT *,b.id as bid 
	FROM bookings b 
	LEFT JOIN services s ON b.services_id = s.id 
	LEFT JOIN styles y ON b.styles_id = y.id 
	LEFT JOIN users u ON b.users_id = u.id 
	WHERE b.booking_status = '3'
	ORDER BY b.booking_date,b.booking_time ASC";
	$res = mysqli_query($con,$sql);

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['bid'],
			'users_id' => $row['users_id'],
			'services_id' => $row['services_id'],
			'styles_id' => $row['styles_id'],
			'booking_name' => $row['booking_name'],
			'booking_phone' => $row['booking_phone'],
			'booking_email' => $row['booking_email'],
			'booking_date' => $row['booking_date'],
			'booking_time' => $row['booking_time'],
			'booking_status' => $row['booking_status'],
			'ser_name' => $row['ser_name'],
			'ser_detail' => $row['ser_detail'],
			'ser_price' => $row['ser_price'],
			'ser_deposit' => $row['ser_deposit'],
			'ser_style' => $row['ser_style'],
			'ser_image' => $row['ser_image'],
			'username' => $row['username'],
			'password' => $row['password'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'email' => $row['email'],
			'phone' => $row['phone']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function getCurrentPaymentByBookingId($bookings_id){

	global $con;

	$sql = "SELECT * FROM payments WHERE bookings_id = '".$bookings_id."'";

	$res = mysqli_query($con,$sql);
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function updateBookingStatus($bookings_id,$booking_status){

	global $con;

	/*if($booking_status == 1){

	}else{

	}*/
	$sql="UPDATE bookings SET booking_status='".$booking_status."' WHERE id = '".$bookings_id."'";
	mysqli_query($con,$sql);


	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('บันทึกข้อมูลเรียบร้อย');
		window.location.href='manage_payment.php';
		</script>"); 

}

function successStatus($bookings_id){

	global $con;

	$sql="UPDATE bookings SET booking_status='4' WHERE id = '".$bookings_id."'";
	mysqli_query($con,$sql);


	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('บันทึกข้อมูลเรียบร้อย');
		window.location.href='manage_queue.php';
		</script>"); 

}
?>