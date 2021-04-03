<div class="container">
    <form class="form-signin" action="" method="post">
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
        <input type="email" id="inputEmail" class="form-control" name="forget-email" placeholder="Email address" required autofocus>
        <label for="inputEmail"><i class="fas fa-user"></i> ایمیل</label>
      </div>

      <div class="form-label-group text-center">
          <img src="<?=URL?>captcha">
      </div>

      <div class="form-label-group">
        <input type="text" id="inputPassword" class="form-control" name="code" placeholder="security" required autocomplete="off">
        <label for="inputPassword"><i class="fas fa-key"></i> کد امنیتی</label>
      </div>

      <br>
    

      <button class="btn btn-lg btn-primary btn-block" type="submit">بازنشانی رمزعبور <i class="fas fa-paper-plane"></i></button>
    </form>
  </div>