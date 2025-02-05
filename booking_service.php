<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$currentUser = getCurrentUser($_SESSION["id"]);
$currentService = getCurrentService($_GET["id"]);
$allStyle = getAllStyle();

if(isset($_POST["submit"])){
  saveBooking($_POST["services_id"],$_POST["users_id"],$_POST["booking_name"],$_POST["booking_phone"],$_POST["booking_email"],$_POST["booking_date"],$_POST["booking_time"],$_POST["styles_id"]);
}
?>
<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>


  <main class="" id="main-collapse">


    <div class="row">
      <div class="col-xs-12 col-md-6">
        <img class="img-responsive" alt="" src="images/service/<?php echo $currentService["ser_image"];?>">

        <!--<div class="row">
          <div class="col-xs-12 section-container-spacer">
            <h3>ลวดลาย</h3>
          </div>

          <?php if(empty($allStyle)){ ?>
          <?php }else{?>
            <?php $i=1;?>
            <?php foreach($allStyle as $data){ ?>
              <div class="col-xs-12 col-md-3 section-container-spacer">
                <img class="img-responsive" alt="" src="images/styles/<?php echo $data["sty_image"];?>" style="height:100px;">
                <p><?php echo $data["sty_name"];?></p>
              </div>

            <?php } ?>
          <?php } ?>

        </div>-->

      </div>
      <div class="col-xs-12 col-md-6">
        <h1><?php echo $currentService["ser_name"];?></h1>
        <h3>ข้อมูลการบริการ </h3>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>รายละเอียด</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo $currentService["ser_detail"];?></label>
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
              <label><?php echo number_format($currentService["ser_price"]);?> บาท</label>
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
              <label><?php echo number_format($currentService["ser_deposit"]);?> บาท</label>
            </div>
          </div>
        </div>
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
        <?php if($_SESSION['id'] != "" && !empty($_SESSION['id'])){ ?>
          <legend>ข้อมูลผู้จอง</legend>
          <form class="reveal-content" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="services_id" name="services_id" value="<?php echo $currentService["id"];?>">
            <input type="hidden" class="form-control" id="styles_id" name="styles_id" value="<?php echo $currentService["id"];?>">
            <input type="hidden" class="form-control" id="users_id" name="users_id" value="<?php echo $_SESSION["id"];?>">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>ชื่อ-นามสกุล</label>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <input type="text" class="form-control" id="booking_name" name="booking_name" value="<?php echo $currentUser["firstname"];?> <?php echo $currentUser["lastname"];?>">
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
                  <input type="text" class="form-control" id="booking_phone" name="booking_phone" value="<?php echo $currentUser["phone"];?>">
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
                  <input type="text" class="form-control" id="booking_email" name="booking_email" value="<?php echo $currentUser["email"];?>" >
                </div>
              </div>
            </div>
            <?php if($currentService["ser_style"] == 1){ ?>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>ลวดลาย </label>
                  </div>
                </div>
                <div class="col-md-8" style="text-align: center;">
                  <div class="form-group">
                    <?php //if($_SESSION['styles_id'] == ""){ ?>
                      <a href="selected_style.php?id=<?php echo $_GET['id'];?>" class="btn btn-info btn-lg">เลือกลวดลาย</a>
                    <?php //}else{ ?>
                      <?php $currentStyle = getCurrentStyle($_SESSION["styles_id"]);?>
                      <input type="hidden" class="form-control" id="styles_id" name="styles_id" value="<?php echo $_SESSION["styles_id"];?>" required>
                      <img class="img-responsive" alt="" src="images/styles/<?php echo $currentStyle["sty_image"];?>" style="width:150px;height:150px;">
                    <?php //} ?>

                  </div>
                </div>
              </div>
            <?php }else{ ?>
              <input type="hidden" class="form-control" id="styles_id" name="styles_id" value="0" >
            <?php } ?>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>วัน/เดือน/ปี ที่จอง</label>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <input type="text" class="form-control" id="app_date" name="booking_date" required>
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
                  <input type="text" class="form-control" id="app_time" name="booking_time" required>
                </div>
              </div>
            </div>

            <div align="right">
              <button type="submit" name="submit" class="btn btn-success btn-lg">ยืนยันการจอง</button>
            </div>
          </form>

        <?php }else{ ?>
          <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label style="color: red;"></label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label style="color: red;">เข้าสู่ระบบเพื่อทำการจอง</label>
            </div>
          </div>
        </div>
        <?php } ?>

      </div>
    </div>



  </main>

  <?php
  require_once("footer.php");
  ?>
  <script>
    var today = new Date();
    
    $('#app_date').datetimepicker({
      lang:'th',
      minDate:today,
      timepicker:false,
      format:'d/m/Y'
    });
    $('#app_time').datetimepicker({
      lang:'th',
      datepicker:false,
      format:'H:i',
      enabledHours: '10'

    });
  </script>
</body>

</html>