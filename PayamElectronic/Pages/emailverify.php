<div class="container">
      <div class="text-center mb-4">
        <img class="mb-4" src="<?=URL?>PayamElectronic/Template/img/PayamElectronic.png" alt="" width="400" >
      </div>
      <?php if (isset($success)){
        ?>
      <div class="alert alert-success" role="alert">
      </div>
      <?php } ?>
      <div class="alert alert-success text-center" role="alert">
      <?php if(verifycode_chk(ID)){?>
        <p><i class="far fa-check-circle"></i> ایمیل شما با موفقیت فعال شد.</p>
          <?php }else{ ?>
            <p><i class="far fa-check-circle"></i>خطا</p>
            

         <?php } ?>
      </div>
      <div class="form-signin" >
        <a href="<?=URL?>login"><button  class="btn btn-lg btn-primary btn-block " type="submit">بازگشت <i class="fas fa-home"></i></button></a>
      </div>

      <?php
      global $error;
      global $success;
      if(isset($error)){

      ?>
      <div class="alert alert-danger" role="alert">
      <?php echo $error; ?>
      </div>
      <?php } ?>
      
  </div>
   