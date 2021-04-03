<div class="container">
    <form class="form-signin" method="post" >
      <div class="text-center mb-4">
        <img class="mb-4" src="<?=URL?>PayamElectronic/Template/img/PayamElectronic.png" alt="" width="330" >
      </div>
      <?php 
            global $error;
            global $success;
            if(code_chk(ID)=="invalid"){
              $error='شما اجازه تغییر رمز را ندارید.';
            }
      if (isset($success)){
        ?>
      <div class="alert alert-success" role="alert">
      <?php echo $success; ?>
      </div>
      <?php }?>
        

      <?php
      if(!isset($success)){
      if(isset($error)){

      ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $error; ?>
      </div>
      <?php } }   if(code_chk(ID)!="invalid"){?>


        <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name="email" value="<?php echo code_chk(ID); ?>" placeholder="Email address"  disabled>
        <label for="inputEmail"><i class="fas fa-user"></i> ایمیل</label>
      </div>
      <input type="hidden" name="email-reset" value="<?php echo code_chk(ID); ?>">
      <input type="hidden" name="id" value="<?php echo ID; ?>">
      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password-reset" placeholder="Password" required>
        <label for="inputPassword"><i class="fas fa-key"></i> رمز عبور</label>
      </div>
      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="repassword-reset" placeholder="Password" required>
        <label for="inputPassword"><i class="fas fa-key"></i> تکرار رمز عبور</label>
      </div>



      <div class="form-label-group text-center">
          <img src="<?=URL?>captcha">
      </div>

      <div class="form-label-group">
        <input type="text" id="inputPassword" class="form-control" name="code" placeholder="security" required autocomplete="off">
        <label for="inputPassword"><i class="fas fa-key"></i> کد امنیتی</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">ورود <i class="fas fa-sign-in-alt"></i></button>
      <?php  }?>
    </form>
  </div>