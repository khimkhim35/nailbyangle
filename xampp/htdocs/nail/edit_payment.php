<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 

$currentBooking = getCurrentBooking($_GET["id"]);
if(isset($_POST["submit"])){
  savePayment($_POST["bookings_id"],$_POST["date_payment"],$_POST["money"],$_FILES["slipt_image"]["name"]);
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

        
        
        
      </div>


    </div>
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <img class="img-responsive" alt="" src="images/qr.jpg" id="blah">
      </div>
      <div class="col-xs-12 col-md-6">
        <legend>ข้อมูลการชำระ</legend>
        <form class="reveal-content" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="bookings_id" value="<?php echo $_GET["id"];?>">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>วัน/เดือน/ปี ที่ชำระ</label>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <?php
                $yThai = date("Y")+543;
                $dateNow = $yThai.date("-m-d");
                ?>
                <input type="text" class="form-control" id="date_payment" name="date_payment" value="<?php echo formatDateFull($dateNow);?>" readonly>
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
                <input type="text" class="form-control" id="money" name="money" value="<?php echo number_format($currentBooking["ser_deposit"]);?>" readonly>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>อัพโหลดหลักฐาน</label>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <input type="file" class="form-control" name="slipt_image" id="imgInp" required>
              </div>
            </div>
          </div>
          <div align="right">
            <button type="submit" name="submit" class="btn btn-success btn-lg">ส่งหลักฐาน</button>
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