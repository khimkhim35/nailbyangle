<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$yThai = date("Y")+543;
$dateNow = $yThai.date("-m-d");
$currentInformation = getCurrentInformation($_GET["id"]);
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveInformation($_POST["users_id"],$_POST["topic"],$_POST["info_detail"],$_POST["date_create"],$_FILES["info_image"]["name"]);
  }else{
    editInformation($_POST["id"],$_POST["users_id"],$_POST["topic"],$_POST["info_detail"],$_POST["date_create"],$_FILES["info_image"]["name"]);
  }
}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม ประชาสัมพันธ์";
}else{
  $txtHead = "แก้ไข ประชาสัมพันธ์";
}
?>
<body style="background-color: #F5DCE0;">

  <?php
  require_once("nav.php");
  ?>


  <main class="" id="main-collapse">

    <div class="row">
      <div class="col-xs-12">
        <div class="section-container-spacer">
          <h1><?php echo $txtHead;?></h1>
          <p>ข้อมูลห้องพัก</p>
        </div>
        <div class="section-container-spacer">
          <form class="reveal-content" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentInformation["id"];?>">
            <input type="hidden" class="form-control" name="users_id" value="<?php echo $_SESSION["id"];?>">
            <div class="row">
              <div class="col-md-6">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>หัวข้อ</label>
                      <input type="text" class="form-control" id="topic" name="topic" value="<?php echo $currentInformation["topic"];?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>รายละเอียด </label>
                      <textarea class="form-control" rows="3" name="info_detail"><?php echo $currentInformation["info_detail"];?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>วันที่</label>
                      <input type="text" class="form-control" id="date_create" name="date_create" value="<?php echo $dateNow;?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>ไฟล์ภาพ</label>
                      <input type="file" class="form-control" name="info_image" id="imgInp" >
                    </div>
                  </div>
                </div>
                

                <div align="right">
                  <button type="submit" name="submit" class="btn btn-success btn-lg">บันทึก</button>
                </div>
              </div>
              <div class="col-md-6" >
                <div class="col-xs-12 col-md-12 section-container-spacer" align="center">
                  <?php if($currentInformation["info_image"] == ""){ ?>
                    <img class="img-responsive" alt="" src="images/user_ico.png" id="blah">
                  <?php }else{ ?>
                    <img class="img-responsive" alt="" src="images/information/<?php echo $currentInformation["info_image"];?>" id="blah">
                  <?php } ?>
                </div>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

  </main>
  <?php
  require_once("footer.php");
  ?>
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
  </script>
</body>

</html>