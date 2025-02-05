<!-- Add your content of header -->
<?php
$checkPaymentAmount = getCheckPaymentAmount();
$checkQueueAmount = getCheckQueueAmount();
if (isset($_GET['logout'])) {
  logout();
}

?>
<style>

  .badge {
    background-color: red;
    color: white;
    padding: 4px 8px;
    text-align: center;
    border-radius: 5px;
  }
</style>
<header class="" style="margin-top: -25px;">
  <div class="navbar navbar-default visible-xs">
    <button type="button" class="navbar-toggle collapsed">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="index.php" class="navbar-brand">Spare Room</a>
  </div>

  <nav class="sidebar" style="background-color: #F5DCE0;">
    <div class="navbar-collapse" id="navbar-collapse">
      <div class="site-header hidden-xs">
        <a class="site-brand" href="index.php" title="">
          <img class="img-responsive site-logo" alt="" src="./assets/images/nail_logo.png">
          Nail By Angel
        </a>
        <p>ร้านเนลบายแองเจิ้ล</p>
      </div>
      <ul class="nav">
        <?php if($_SESSION['id'] == "" && empty($_SESSION['id'])){ ?>
          <li><a href="index.php" title="หน้าหลัก">หน้าหลัก</a></li>
          <li><a href="all_service.php" title="บริการ">บริการ</a></li>
          <li><a href="all_style.php" title="ลวดลาย/สี">ลวดลาย/สี</a></li>
          <li><a href="all_information.php" title="ประชาสัมพันธ์">ประชาสัมพันธ์</a></li>
          <li><a href="login.php" title="เข้าสู่ระบบ">เข้าสู่ระบบ</a></li>
          <!--<li><a href="all_apartment.php" title="จองห้องพัก">จองห้องพัก</a></li>
            <li><a href="all_roomate.php" title="ค้นหารูมเมท">ค้นหารูมเมท</a></li>-->
          <?php }else{ ?>
            <?php if($_SESSION['role'] == 1){ ?>
              <li><a href="index.php" title="หน้าหลัก">หน้าหลัก</a></li>
              <li><a href="manage_admin.php" title="ข้อมูลผู้ดูแลระบบ">ข้อมูลผู้ดูแลระบบ</a></li>
              <li><a href="manage_member.php" title="ข้อมูลสมาชิก">ข้อมูลสมาชิก</a></li>
              <li><a href="manage_service.php" title="ข้อมูลบริการ">ข้อมูลบริการ</a></li>
              <li><a href="manage_style.php" title="ข้อมูลลวดลาย/สี">ข้อมูลลวดลาย/สี</a></li>
              <li><a href="manage_payment.php" title="ตรวจสอบการชำระ">ตรวจสอบการชำระ <?php if($checkPaymentAmount["numCount"] != 0){ ?><span class="badge"><?php echo $checkPaymentAmount["numCount"];?></span><?php } ?></a> </li>
              <li><a href="manage_queue.php" title="การจองคิว">การจองคิว <?php if($checkQueueAmount["numCount"] != 0){ ?><span class="badge"><?php echo $checkQueueAmount["numCount"];?></span><?php } ?></a> </li>
              <li><a href="manage_information.php" title="ข้อมูลประชาสัมพันธ์">ข้อมูลประชาสัมพันธ์</a></li>
              <li><a href="all_history.php" title="ประวัติการจองทั้งหมด">ประวัติการจองทั้งหมด</a></li>
              <li><a href="profile.php" title="ข้อมูลส่วนตัว">ข้อมูลส่วนตัว</a></li>
              <li><a href="?logout=true" title="ออกจากระบบ">ออกจากระบบ</a></li>
            <?php } ?>
            <?php if($_SESSION['role'] == 2){ ?>
              <li><a href="index.php" title="หน้าหลัก">หน้าหลัก</a></li>
              <li><a href="all_service.php" title="บริการ">บริการ</a></li>
              <li><a href="all_style.php" title="ลวดลาย/สี">ลวดลาย/สี</a></li>
              <li><a href="history_booking.php" title="ประวัติการจอง">ประวัติการจอง</a></li>
              <li><a href="all_information.php" title="ประชาสัมพันธ์">ประชาสัมพันธ์</a></li>
              <li><a href="profile.php" title="ข้อมูลส่วนตัว">ข้อมูลส่วนตัว</a></li>
              <li><a href="?logout=true" title="ออกจากระบบ">ออกจากระบบ</a></li>
            <?php } ?>

          <?php } ?>

        </ul>

        <nav class="nav-footer">
          <p class="nav-footer-social-buttons">
            <a class="fa-icon" href="https://www.instagram.com/" title="">
              <i class="fa fa-instagram"></i>
            </a>
            <a class="fa-icon" href="https://dribbble.com/" title="">
              <i class="fa fa-dribbble"></i>
            </a>
            <a class="fa-icon" href="https://twitter.com/" title="">
              <i class="fa fa-twitter"></i>
            </a>
          </p>
          <p>© Create By <br/> ร้านเนลบายแองเจิ้ล </p>
        </nav>  
      </div> 
    </nav>
  </header>