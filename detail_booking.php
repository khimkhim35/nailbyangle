<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 

$currentBooking = getCurrentBooking($_GET["id"]);

?>
<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>


  <main class="" id="main-collapse">


    <div class="row">
      <div class="col-xs-12 col-md-6">
        <img class="img-responsive" alt="" src="images/service/<?php echo $currentBooking["ser_image"];?>">
      </div>
      <div class="col-xs-12 col-md-6">
        <h1><?php echo $currentBooking["ser_name"];?></h1>
        <h3>ข้อมูลบริการ </h3>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>รายละเอียด</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo $currentBooking["ser_detail"];?></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>ราคา</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo number_format($currentBooking["ser_price"]);?> บาท</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>ค่ามัดจำ</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo number_format($currentBooking["ser_deposit"]);?> บาท</label>
            </div>
          </div>
        </div>
        <?php if($currentBooking["styles_id"] != 0){ ?>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>ลวดลาย </label>
              </div>
            </div>
            <div class="col-md-8" style="text-align: center;">
              <div class="form-group">
                <img class="img-responsive" alt="" src="images/styles/<?php echo $currentBooking["sty_image"];?>" style="width:150px;height:150px;">
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label style="color: red;">หมายเหตุ</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label style="color: red;">ทางร้าน ขอยกเลิกสิทธิ์ในการจองของท่านกรณีที่ท่านมาช้ากว่าเวลาที่นัดไว้ 1 ชั่วโมง</label>
            </div>
          </div>
        </div>

        <legend>ข้อมูลผู้จอง</legend>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>ชื่อ-นามสกุล</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo $currentBooking["booking_name"];?></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>หมายเลขโทรศัพท์</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo $currentBooking["booking_phone"];?></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>อีเมล</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo $currentBooking["booking_email"];?></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>วัน/เดือน/ปี ที่จอง</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo formatDateFull($currentBooking["booking_date"]);?></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>เวลา ที่จอง</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo formatTime($currentBooking["booking_time"]);?></label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>สถานะ</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo $booking_map[$currentBooking["booking_status"]];?></label>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    

  </main>

  <?php
  require_once("footer.php");
  ?>
</body>

</html>