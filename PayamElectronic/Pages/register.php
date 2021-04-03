<div class="container">
    <form class="form-signin" method="post" action="register">
    <div class="text-center mb-4">
        <img class="mb-4" src="PayamElectronic/Template/img/PayamElectronic.png" alt="" width="330" >
      </div>
      <?php
            global $error;
            global $success;
       if (isset($success)){
        ?>
      <div class="alert alert-success" role="alert">
      <?php echo $success; ?>
      </div>
      <?php }?>
        

      <?php
      if(isset($error)){

      ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $error; ?>
      </div>
      <?php } ?>
      <div class="form-label-group">
        <input type="text" id="inputEmail" class="form-control" name="name-r" placeholder="Email address" required autofocus>
        <label for="inputEmail"><i class="fas fa-user"></i> نام</label>
      </div>
      <div class="form-label-group">
        <input type="text" name="family-r" id="inputEmail" class="form-control" placeholder="Email address" required >
        <label for="inputEmail"><i class="fas fa-user"></i> نام خانوادگی</label>
      </div>
      <div class="form-label-group">
        <input type="email" id="inputEmail" name="email-r" class="form-control" placeholder="Email address" required >
        <label for="inputEmail"><i class="fas fa-user"></i> ایمیل</label>
      </div>
      <div class="form-label-group">
        <input type="password" id="inputPassword" name="pass-r" class="form-control" placeholder="Password" required>
        <label for="inputPassword"><i class="fas fa-key"></i> رمز عبور</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" name="repass-r" class="form-control" placeholder="Password" required>
        <label for="inputPassword"><i class="fas fa-key"></i> تکرار رمز عبور</label>
      </div>
      
      <div class="row">
        <div class="form-check col-6">
          <input type="checkbox" class="form-check-input" name="low" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">من
            <a href="#">
             قوانین
            </a>
              را خوانده ام.</label>
        </div>





        <div class="col-6 text-left"><a href="<?=URL?>login"><i class="fas fa-user"></i> ورود !</a></div>

      </div>
      <br>



      <div class="form-label-group text-center">
          <img src="<?=URL?>captcha">
      </div>

      <div class="form-label-group">
        <input type="text" id="inputPassword" class="form-control" name="code" placeholder="security" required autocomplete="off">
        <label for="inputPassword"><i class="fas fa-key"></i> کد امنیتی</label>
      </div>
    

      <button class="btn btn-lg btn-primary btn-block" type="submit">ثبت نام <i class="fas fa-sign-in-alt"></i></button>
    </form>
  </div>