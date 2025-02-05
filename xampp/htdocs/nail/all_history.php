<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allHistoryBooking = getAllHistoryBooking();
?>
<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>
  <main class="" id="main-collapse">

    <!-- Add your site or app content here -->

    <div class="hero-full-wrapper">
      <div class="grid">
        <h1>ประวัติการจองทั้งหมด</h1>
        <table class="table">
          <thead>
            <tr>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>ชื่อ-นามสกุล</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>โทรศัพท์</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>อีเมล</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>บริการ</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>วัน/เดือน/ปี</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>เวลา</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>สถานะ</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"></td>
            </tr>
          </thead>
          <tbody>
            <?php if(empty($allHistoryBooking)){ ?>
            <?php }else{?>
              <?php $i=1;?>
              <?php foreach($allHistoryBooking as $data){ ?>
                <tr>
                  <td ><?php echo $data["booking_name"];?></td>
                  <td style="text-align:center;"><?php echo $data["booking_phone"];?></td>
                  <td style="text-align:center;"><?php echo $data["booking_email"];?></td>
                  <td style="text-align:center;"><?php echo $data["ser_name"];?></td>
                  <td style="text-align:center;"><?php echo formatDateFull($data["booking_date"]);?></td>
                  <td style="text-align:center;"><?php echo formatTime($data["booking_time"]);?></td>
                  <td style="text-align:center;"><?php echo $booking_map[$data["booking_status"]];?></td>
                  <td style="text-align: right;">
                    <a href="detail_booking.php?id=<?php echo $data['id'];?>" class="btn btn-warning btn-lg">รายละเอียด</a>
                  </td>
                </tr>
              <?php } ?>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>
  </main>

  <?php
  require_once("footer.php");
  ?>
</body>

</html>