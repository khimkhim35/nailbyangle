<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 

$currentBooking = getCurrentBooking($_GET["id"]);
$currentPaymentByBookingId = getCurrentPaymentByBookingId($_GET["id"]);

if(isset($_POST["submit"])){
  updateBookingStatus($_POST["bookings_id"],$_POST["booking_status"]);
}



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

        
      </div>


    </div>
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <img class="img-responsive" alt="" src="images/slipt/<?php echo $currentPaymentByBookingId['slipt_image']; ?>" id="blah">
      </div>
      <div class="col-xs-12 col-md-6">
        <legend>ข้อมูลผู้จอง</legend>
        <form class="reveal-content" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="bookings_id" value="<?php echo $_GET["id"];?>">
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
                <label>วันที่</label>
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
                <label>เวลา</label>
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
                <label>วันที่ชำระ</label>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <?php echo formatDateFull($currentPaymentByBookingId['date_payment']);?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>จำนวนเงินที่ต้องชำระ</label>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <?php echo number_format($currentPaymentByBookingId['moneys']);?> บาท
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
                <select name="booking_status" class="form-control" required>
                  <option value="0">ยกเลิก</option>
                  <option value="1">ค้างชำระ</option>
                  <option value="2">รอตรวจสอบ</option>
                  <option value="3">ยืนยัน</option>
                </select>
              </div>
            </div>
          </div>
          <div align="right">
            <button type="submit" name="submit" class="btn btn-success btn-lg">ยืนยัน</button>
          </div>
        </form>
      </div>
    </div>

    

  </main>

  <?php
  require_once("footer.php");
  ?>

  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
  </script>
</body>

</html>