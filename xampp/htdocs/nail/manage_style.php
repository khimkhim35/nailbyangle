<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allStyle = getAllStyle();
if (isset($_GET['delete'])) {
  deleteStyle($_GET['delete']);
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
        <h1>ข้อมูลลวดลาย/สี</h1>
        <div align="right">
          <a href="edit_style.php" class="btn btn-success btn-lg">เพิ่มลวดลาย/สี</a>
        </div>
        <table class="table" >
          <thead>
            <tr>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>รูปภาพลวดลาย</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"><h4>ชื่อลวดลาย</h4></td>
              <td style="border-bottom:1px solid #000;text-align:center;"></td>
            </tr>
          </thead>
          <tbody>
            <?php if(empty($allStyle)){ ?>
            <?php }else{?>
              <?php $i=1;?>
              <?php foreach($allStyle as $data){ ?>
                <tr>
                  <td><img class="img-responsive" alt="" src="images/styles/<?php echo $data["sty_image"];?>" id="blah" style="width:100px;height:100px;"></td>
                  <td style="text-align:center;"><?php echo $data["sty_name"];?></td>
                  <td style="text-align: right;">
                    <a href="edit_style.php?id=<?php echo $data['id'];?>&apartments_id=<?php echo $_GET['apartments_id']?>" class="btn btn-warning btn-lg">แก้ไข</a>
                    <a href="?delete=<?php echo $data['id'];?>&apartments_id=<?php echo $data['apartments_id'];?>" class="btn btn-danger btn-lg" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
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