<!DOCTYPE html>
<html lang="en">

<?php
require_once("header.php");
?>
<?php 
if(isset($_POST["submit"])){
  $checkEmail = getCheckEmail($_GET["email"]);
  if($checkEmail["numCount"] == 0){
    saveRegister($_POST["username"],$_POST["password"],$_POST["firstname"],$_POST["lastname"],$_POST["email"],$_POST["phone"]);
  }else{
    echo '<script>alert("Email มีการใช้งานแล้วไม่สามารถสมัครได้")</script>';  
    echo '<script>window.history.go(-1)</script>'; 
  }
  
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
          <h1>สมัครสมาชิก</h1>
          <p>ข้อมูลผู้ใช้งาน</p>
        </div>
        <div class="section-container-spacer">
          <form class="reveal-content" action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" id="username" name="username" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>รหัสผ่าน</label>
                      <input type="password" class="form-control" id="password" name="password" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>ชื่อ</label>
                      <input type="text" class="form-control" id="firstname" name="firstname" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>นามสกุล</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>อีเมล</label>
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>โทรศัพท์</label>
                      <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                  </div>
                </div>
                
                <div align="right">
                  <button type="submit" name="submit" class="btn btn-success btn-lg">บันทึก</button>
                </div>
              </div>
              <div class="col-md-6" >
                <div class="col-xs-12 col-md-12 section-container-spacer" align="center">
                  <img class="img-responsive" alt="" src="images/user_ico.png" id="blah">
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