<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allInformation = getAllInformation();
if (isset($_GET['delete'])) {
  deleteInformation($_GET['delete']);
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
        <h1>ข้อมูลประชาสัมพันธ์</h1>
        <div align="right">
          <a href="edit_information.php" class="btn btn-success btn-lg">เพิ่มประชาสัมพันธ์</a>
        </div>
        <table class="table" >
          <thead>
            <tr>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>หัวข้อ</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>วัน/เดือน/ปี</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"></td>
            </tr>
          </thead>
          <tbody>
            <?php if(empty($allInformation)){ ?>
            <?php }else{?>
              <?php $i=1;?>
              <?php foreach($allInformation as $data){ ?>
                <tr>
                  <td><?php echo $data["topic"];?></td>
                  <td style="text-align:center;"><?php echo formatDateFull($data["date_create"]);?></td>
                  <td style="text-align: right;">
                    <a href="edit_information.php?id=<?php echo $data['id'];?>" class="btn btn-warning btn-lg">แก้ไข</a>
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