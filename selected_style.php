<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allStyle = getAllStyle();
if(isset($_POST["add_to_cart"]))  
{
  session_start();
  $_SESSION['styles_id'] = $_POST['styles_id'];
  $id = $_POST['id'];
  echo ("<script language='JavaScript'>
    alert('บันทึกลวดลายเรียบร้อย');
    window.location.href='booking_service.php?id=$id';
    </script>"); 
}
?>

<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>


  <main class="" id="main-collapse">


    <div class="row">
      <div class="col-xs-12 section-container-spacer">
        <h1>ลวดลาย/สี ทั้งหมด</h1>
        <p>ตัวอย่างลวดลาย/สี</p>
      </div>

      <?php if(empty($allStyle)){ ?>
      <?php }else{?>
        <?php $i=1;?>
        <?php foreach($allStyle as $data){ ?>
          <form method="post" action="" style="text-align: center;">
            <input type="hidden" name="styles_id" id="styles_id" value="<?php echo $data['id']?>">
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>">
            <div class="col-xs-12 col-md-3 section-container-spacer">
              <img class="img-responsive" alt="" src="images/styles/<?php echo $data["sty_image"];?>" style="height:300px;">
              <p><?php echo $data["sty_name"];?></p>
              <input type="submit" name="add_to_cart" value="เลือกลายนี้" class="btn btn-warning" ></p>
            </div>
          </form>

        <?php } ?>
      <?php } ?>

    </div>

  </main>

  <?php
  require_once("footer.php");
  ?>
  
</body>

</html>