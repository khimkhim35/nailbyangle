<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allService = getAllService();
if (isset($_GET['delete'])) {
  deleteService($_GET['delete']);
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
        <h1>ข้อมูลบริการ</h1>
        <div align="right">
          <a href="edit_service.php" class="btn btn-success btn-lg">เพิ่มบริการ</a>
        </div>
        <table class="table">
          <thead>
            <tr>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>ชื่อบริการ</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>ราคา</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>ค่ามัดจำ</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"></td>
            </tr>
          </thead>
          <tbody>
            <?php if(empty($allService)){ ?>
            <?php }else{?>
              <?php $i=1;?>
              <?php foreach($allService as $data){ ?>
                <tr>
                  <td><?php echo $data["ser_name"];?></td>
                  <td style="text-align:center;"><?php echo number_format($data["ser_price"]);?></td>
                  <td style="text-align:center;"><?php echo number_format($data["ser_deposit"]);?></td>
                  <td style="text-align: right;">
                    <a href="edit_service.php?id=<?php echo $data['id'];?>" class="btn btn-warning btn-lg">แก้ไข</a>
                    <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger btn-lg" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
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