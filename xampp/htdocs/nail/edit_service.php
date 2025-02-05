<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
$currentService = getCurrentService($_GET["id"]);
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveService($_POST["ser_name"],$_POST["ser_detail"],$_POST["ser_price"],$_POST["ser_deposit"],$_POST["ser_style"],$_FILES["ser_image"]["name"]);
  }else{
    editService($_POST["id"],$_POST["ser_name"],$_POST["ser_detail"],$_POST["ser_price"],$_POST["ser_deposit"],$_POST["ser_style"],$_FILES["ser_image"]["name"]);
  }
}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม บริการ";
}else{
  $txtHead = "แก้ไข บริการ";
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
          <p>ข้อมูลบริการ</p>
        </div>
        <div class="section-container-spacer">
          <form class="reveal-content" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentService["id"];?>">
            <div class="row">
              <div class="col-md-6">

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>ชื่อบริการ</label>
                      <input type="text" class="form-control" id="ser_name" name="ser_name" value="<?php echo $currentService["ser_name"];?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>รายละเอียด </label>
                      <textarea class="form-control" rows="3" name="ser_detail"><?php echo $currentService["ser_detail"];?></textarea>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ราคา</label>
                      <input type="text" class="form-control" id="ser_price" name="ser_price" value="<?php echo $currentService["ser_price"];?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ค่ามัดจำ</label>
                      <input type="text" class="form-control" id="ser_deposit" name="ser_deposit" value="<?php echo $currentService["ser_deposit"];?>">
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>การเลือกลวดลาย</label>
                      <select name="ser_style" class="form-control" required>
                        <option value="">-- โปรดระบุ --</option>
                        <option value="1" <?php if($currentService['ser_style'] == 1){ ?> selected<?php } ?>>มี</option>
                        <option value="2" <?php if($currentService['ser_style'] == 2){ ?> selected<?php } ?>>ไม่มี</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>รูปหน้าปก</label>
                      <input type="file" class="form-control" name="ser_image" id="imgInp" >
                    </div>
                  </div>
                </div>
                

                <div align="right">
                  <button type="submit" name="submit" class="btn btn-success btn-lg">บันทึก</button>
                </div>
              </div>
              <div class="col-md-6" >
                <div class="col-xs-12 col-md-12 section-container-spacer" align="center">
                  <?php if($currentService["ser_image"] == ""){ ?>
                    <img class="img-responsive" alt="" src="images/user_ico.png" id="blah">
                  <?php }else{ ?>
                    <img class="img-responsive" alt="" src="images/service/<?php echo $currentService["ser_image"];?>" id="blah">
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