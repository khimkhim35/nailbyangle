<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$currentStyle = getCurrentStyle($_GET["id"]);
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveStyle($_POST["sty_name"],$_FILES["sty_image"]["name"]);
  }else{
    editStyle($_POST["id"],$_POST["sty_name"],$_FILES["sty_image"]["name"]);
  }
}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม ลวดลาย/สี";
}else{
  $txtHead = "แก้ไข ลวดลาย/สี";
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
          <p>ข้อมูลลวดลาย/สี</p>
        </div>
        <div class="section-container-spacer">
          <form class="reveal-content" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentStyle["id"];?>">
            <div class="row">
              <div class="col-md-6">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>ชื่อลวดลาย</label>
                      <input type="text" class="form-control" id="sty_name" name="sty_name" value="<?php echo $currentStyle["sty_name"];?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>อัพโหลดไฟล์ภาพ</label>
                      <input type="file" class="form-control" name="sty_image" id="imgInp" >
                    </div>
                  </div>
                </div>
                
                <div align="right">
                  <button type="submit" name="submit" class="btn btn-success btn-lg">บันทึก</button>
                </div>
              </div>
              <div class="col-md-6" >
                <div class="col-xs-12 col-md-12 section-container-spacer" align="center">
                  <?php if($currentStyle["sty_image"] == ""){ ?>
                    <img class="img-responsive" alt="" src="images/user_ico.png" id="blah">
                  <?php }else{ ?>
                    <img class="img-responsive" alt="" src="images/styles/<?php echo $currentStyle["sty_image"];?>" id="blah">
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