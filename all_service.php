<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allService = getAllService();
?>
<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>


  <main class="" id="main-collapse">
    

    <div class="row">
      <div class="col-xs-12 section-container-spacer">
        <h1>บริการ ทั้งหมด</h1>
        <p>ข้อมูลบริการ</p>
      </div>

      <?php if(empty($allService)){ ?>
      <?php }else{?>
        <?php $i=1;?>
        <?php foreach($allService as $data){ ?>
          <div class="col-xs-12 col-md-3 section-container-spacer">
            <img class="img-responsive" alt="" src="images/service/<?php echo $data["ser_image"];?>" style="height: 300px;">
            <h3><?php echo $data["ser_name"];?></h3>
            <!--<p><?php echo $room_map[$data["room_type"]];?></p>-->

            <?php if($_SESSION['id'] != "" && !empty($_SESSION['id'])){ ?>
              <a href="booking_service.php?id=<?php echo $data['id'];?>" class="btn btn-primary" title=""> จองรายการนี้</a>
            <?php }else{ ?>
              <a href="booking_service.php?id=<?php echo $data['id'];?>" class="btn btn-primary" title=""> รายละเอียด</a>
            <?php } ?>
          </div>

        <?php } ?>
      <?php } ?>

    </div>


  </main>

  <?php
  require_once("footer.php");
  ?>
</body>

</html>