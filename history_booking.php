<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allUserBooking = getAllUserBooking($_SESSION["id"]);
if (isset($_GET['cancel'])) {
  cancelBooking($_GET['cancel']);
}
?>
<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>
  <main class="" id="main-collapse">

    <!-- Add your site or app content here -->

    <div class="hero-full-wrapper">
      <div class="grid">
        <h1>ประวัติการจอง</h1>
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
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php if(empty($allUserBooking)){ ?>
            <?php }else{?>
              <?php $i=1;?>
              <?php foreach($allUserBooking as $data){ ?>
                <tr>
                  <td><?php echo $data["booking_name"];?></td>
                  <td style="text-align:center;"><?php echo $data["booking_phone"];?></td>
                  <td style="text-align:center;"><?php echo $data["booking_email"];?></td>
                  <td style="text-align:center;"><?php echo $data["ser_name"];?></td>
                  <td style="text-align:center;"><?php echo formatDateFull($data["booking_date"]);?></td>
                  <td style="text-align:center;"><?php echo formatTime($data["booking_time"]);?></td>
                  <td style="text-align:center;"><?php echo $booking_map[$data["booking_status"]];?></td>
                  <td style="text-align: right;">
                    <?php if($data["booking_status"] == 1){?>
                      <a href="edit_payment.php?id=<?php echo $data['id'];?>" class="btn btn-success btn-lg">ชำระเงิน</a>
                      <a href="?cancel=<?php echo $data['id'];?>" class="btn btn-danger btn-lg" onClick="javascript: return confirm('ยืนยันการยกเลิก');">ยกเลิก</a>
                    <?php } ?>
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