<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 

$currentInformation = getCurrentInformation($_GET["id"]);

?>
<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>


  <main class="" id="main-collapse">


    <div class="row">
      <div class="col-xs-12 col-md-6">
        <img class="img-responsive" alt="" src="images/information/<?php echo $currentInformation["info_image"];?>">
      </div>
      <div class="col-xs-12 col-md-6">
        <h1><?php echo $currentInformation["topic"];?></h1>
        <h3>รายละเอียด </h3>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>วัน/เดือน/ปี ที่ประกาศ</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo formatDateFull($currentInformation["date_create"]);?> </label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>รายละเอียด</label>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label><?php echo $currentInformation["info_detail"];?></label>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    

  </main>

  <?php
  require_once("footer.php");
  ?>
</body>

</html>