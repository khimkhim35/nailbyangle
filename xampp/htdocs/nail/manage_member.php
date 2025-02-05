<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allMember = getAllMember();
if (isset($_GET['delete'])) {
  deleteMember($_GET['delete']);
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
        <h1>ข้อมูล สมาชิก</h1>
        <div align="right">
          <a href="edit_member.php" class="btn btn-success btn-lg">เพิ่ม</a>
        </div>
        <table class="table">
          <thead>
            <tr>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>ชื่อ-นามสกุล</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>โทรศัพท์</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>อีเมล</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"></td>
            </tr>
          </thead>
          <tbody>
            <?php if(empty($allMember)){ ?>
            <?php }else{?>
              <?php $i=1;?>
              <?php foreach($allMember as $data){ ?>
                <tr>
                  <td><?php echo $data["firstname"];?> <?php echo $data["lastname"];?></td>
                  <td style="text-align:center;"><?php echo $data["phone"];?></td>
                  <td style="text-align:center;"><?php echo $data["email"];?></td>
                  <td style="text-align: right;">
                    <a href="edit_member.php?id=<?php echo $data['id'];?>" class="btn btn-warning btn-lg">แก้ไข</a>
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