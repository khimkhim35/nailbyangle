<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$allStyle = getAllStyle();
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
          <div class="col-xs-12 col-md-3 section-container-spacer">
            <img class="img-responsive" alt="" src="images/styles/<?php echo $data["sty_image"];?>" style="width:300px;height:300px;">
            <!--<h2><?php echo $data["sty_name"];?></h2>-->
            <p><?php echo $data["sty_name"];?></p>
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