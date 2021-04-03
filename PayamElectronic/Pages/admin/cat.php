<div class="col-lg-9">

<div class="card-deck mb-3 text-center col-lg-9" style="padding: 20px 20px;">

<div class="card mb-4 shadow-sm">
  <div class="card-header">
    <div class="py-5 text-center">
      <h1>دسته بندی</h1>
    </div>
  </div>



<div class="card-body text-center">



<br>
<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>نام دسته</th>
              <th>توضیحات دسته</th>
              <th>مدیریت</th>
            </tr>
          </thead>
          <tbody>
          <?php
                        global $conn;
                        $stmt = $conn->prepare("SELECT * FROM cat WHERE master_cat=0");
                        $stmt->execute();
                            foreach($stmt->fetchAll() as $v) {
                                
                        ?>
            <tr>
              <td><?=$v['id_cat'] ?></td>
              <td><?=$v['name_cat'] ?></td>
              <td><?=$v['comment_cat'] ?></td>
              <td><a href="<?php echo URL."admin/"."cat-dep"."/".$v['id_cat'];?>"><i class="fas fa-plus"></i></a>/<i class="fas fa-pen"></i>/<i class="far fa-trash-alt"></i></td>
            </tr>
                            <?php } ?>
          </tbody>
        </table>
        <br>

        <form  method="post" class="form-signin" enctype="multipart/form-data">
        <div class="form-label-group">
               <input type="text" class="form-control" id="name-goods" name="cat_name" placeholder="نام محصول" required autofocus autocomplete="off">
               <label for="name-goods"><i class="fab fa-goodreads-g"></i> نام دسته بندی </label>

           </div>
           <div class="form-group">
           <label for="exampleFormControlTextarea1"> <i class="fas fa-comments-dollar"></i> توضیحات  </label>
           <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="cat_comment"></textarea>
       </div>

           <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fas fa-plus"></i> افزودن دسته</button>
       </form>


      </div>
      </div>
</div>

</div>
</div>
                            </div>