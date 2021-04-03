<?php
?>
  <div class="container">
    <form class="form-signin" method="post" action="login">
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
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
        <label for="inputEmail"><i class="fas fa-user"></i> ایمیل</label>
      </div>
    
      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <label for="inputPassword"><i class="fas fa-key"></i> رمز عبور</label>
      </div>
      
      <div class="row">
        <div class="col-6 "><a href="<?=URL?>register"><i class="fas fa-user-plus"></i> کاربر جدید؟</a></div>
        <div class="col-6 text-left"><p><a href="<?=URL?>forget"><i class="fas fa-key"></i> فراموشی رمز؟</a></div>
      </div>


      <div class="form-label-group text-center">
          <img src="<?=URL?>captcha">
      </div>

      <div class="form-label-group">
        <input type="text" id="inputPassword" class="form-control" name="code" placeholder="security" required autocomplete="off">
        <label for="inputPassword"><i class="fas fa-key"></i> کد امنیتی</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">ورود <i class="fas fa-sign-in-alt"></i></button>
    </form>
  </div>

   


