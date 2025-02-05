<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 

$currentUser = getCurrentUser($_GET["id"]);
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveMember($_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["phone"],$_POST["role"]);
  }else{
    editMember($_POST["id"],$_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["phone"],$_POST["role"]);
  }
}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม ข้อมูลผู้ดูแลระบบ";
}else{
  $txtHead = "แก้ไข ข้อมูลผู้ดูแลระบบ";
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
          <p>ข้อมูลผู้ใช้งาน</p>
        </div>
        <div class="section-container-spacer">
          <form class="reveal-content" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentUser["id"];?>">
            <input type="hidden" class="form-control" name="role" value="2">
            <div class="row">
              <div class="col-md-6">

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" id="username" name="username" value="<?php echo $currentUser["username"];?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>รหัสผ่าน</label>
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo $currentUser["password"];?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ชื่อ</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $currentUser["firstname"];?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>นามสกุล</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $currentUser["lastname"];?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>อีเมล</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $currentUser["email"];?>" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>โทรศัพท์</label>
                      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $currentUser["phone"];?>" required>
                    </div>
                  </div>
                </div>

                <div align="right">
                  <button type="submit" name="submit" class="btn btn-success btn-lg">บันทึก</button>
                </div>
              </div>
              <div class="col-md-6" >
                <div class="col-xs-12 col-md-12 section-container-spacer" align="center">
                  <?php if($currentUser["profile_img"] == ""){ ?>
                    <img class="img-responsive" alt="" src="images/user_ico.png" id="blah">
                  <?php }else{ ?>
                    <img class="img-responsive" alt="" src="images/users/<?php echo $currentUser["profile_img"];?>" id="blah">
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