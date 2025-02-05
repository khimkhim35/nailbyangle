<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allInformation = getAllInformation();
?>
<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>


  <main class="" id="main-collapse">
    

    <div class="row">
      <div class="col-xs-12 section-container-spacer">
        <h1>ประชาสัมพันธ์</h1>
        <p>ข่าวสารทั้งหมด</p>
      </div>

      <?php if(empty($allInformation)){ ?>
      <?php }else{?>
        <?php $i=1;?>
        <?php foreach($allInformation as $data){ ?>
          <div class="col-xs-12 col-md-3 section-container-spacer">
            <img class="img-responsive" alt="" src="images/information/<?php echo $data["info_image"];?>" style="height: 300px;">
            <h3><?php echo $data["topic"];?></h3>
            <p>วันที่<?php echo formatDateFull($data["date_create"]);?></p>
            <a href="detail_information.php?id=<?php echo $data['id'];?>" class="btn btn-primary" title=""> รายละเอียด</a>
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