<?php
session_start();
require("function/function.php");
?>

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="Page description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="จองห้องพัก ซื้อ-ขายสัญญาหอพัก หารูมเมท (Spare Room)" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  
  <link href="assets/apple-icon-180x180.png" rel="apple-touch-icon">
  <link href="assets/favicon.ico" rel="icon">

  <title>การพัฒนาเว็บแอปพลิเคชันการจองคิวทำเล็บ กรณีศึกษา ร้านเนลบายแองเจิ้ล</title>  

  <link href="assets/main.82cfd66e.css" rel="stylesheet">
  <script src="assets/js/jquery-3.5.0.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcTcswQ_y1VyiZJTAo9iJT-00bkx0bBl0"></script>

  <script src="assets/datepicker/datetimepicker-master/jquery.datetimepicker.js"></script>
  <link href="assets/datepicker/datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet" />
</head>
<?php 
$bed_map = array( 1=>'เตียงคู่',2=>'เตียงเดี่ยว');
$booking_map = array( 0=>'<label style="color:red">ยกเลิก</label>',1=>'<label style="color:red">ค้างชำระ</label>',2=>'<label style="color:green">รอตรวจสอบ</label>',3=>'<label style="color:green">ยืนยัน</label>',4=>'<label style="color:green">เรียบร้อย</label>');

?>
