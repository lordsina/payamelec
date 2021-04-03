
    <div class="col-12 col-lg-9">
       
                <form  method="post" class="form-signin" enctype="multipart/form-data">
                <?php 
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

      <div class="card">
  <div class="card-header text-center">
  <i class="fas fa-plus"></i> افزودن کالا
  </div>
  <div class="card-body">





                    <div class="form-label-group">
                        <input type="text" class="form-control" id="name-goods" name="name-goods" placeholder="نام محصول" required autofocus autocomplete="off">
                        <label for="name-goods"><i class="fab fa-goodreads-g"></i> نام محصول </label>

                    </div>
                    <div class="form-label-group">
                        <input type="text" id="price-goods"  class="form-control" name="price-goods" placeholder="Email address" required autofocus autocomplete="off">
                        <label for="price-goods"><i class="fas fa-dollar-sign"></i> قیمت محصول </label>
                    </div>

                    <div class="form-label-group">
                        <input type="text" id="price-goods"  class="form-control" name="count-goods" placeholder="Email address" required autofocus autocomplete="off">
                        <label for="price-goods"><i class="fas fa-tags"></i> تعداد محصول </label>
                    </div>

                    <select class="custom-select custom-select-lg mb-3" name="cat">
                        <option selected> <i class="fas fa-sort"></i>دسته بندی</option>


                        <?php
                        global $conn;
                        $stmt = $conn->prepare("SELECT * FROM cat");
                        $stmt->execute();
                            foreach($stmt->fetchAll() as $v) {
                                echo "<option value=".$v['id_cat'].">".$v['name_cat']."</option>";
                            }
                                
                        ?>
                    </select>
                    <div class="form-label-group">
                    <input type="file" id="pic"  class="form-control" name="file-pic" >
                        <label for="inputEmail"><i class="fas fa-link"></i> عکس محصول </label>

                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlTextarea1"> <i class="fas fa-comments-dollar"></i> توضیحات  </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment-cat"></textarea>
                </div>

                    <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fas fa-plus"></i> افزودن کالا</button>
                </form>
        </div>
    </div>
</div>
                     
</div>
</div>