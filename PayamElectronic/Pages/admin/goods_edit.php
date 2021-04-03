<?php

$goods = edit_goods(ID);

?>



              <div class="card-deck mb-3 text-center col-lg-9" style="padding: 20px 20px;">

                <div class="card mb-4 shadow-sm">
                <form action="" method="POST">
                  <div class="card-header">
                    <div class="py-5 text-center">
                      <img class="d-block mx-auto mb-4" src="<?php echo URL . $goods['img_goods']; ?>" alt="" width="200" height="200">
                    </div>
                  </div>



              <div class="card-body text-center">






                          <div class="row">
                            <div class="col-md-6 mb-3">
                              <label for="firstName">نام محصول</label>
                              <input type="text" class="form-control" id="firstName" placeholder="" name="up-name-goods" value="<?php echo $goods['name_goods']; ?>" required>
                              <input type="hidden" name="id" value="<?php echo $goods['id_goods']; ?>">
                              <div class="invalid-feedback">
                                Valid first name is required.
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <label for="lastName">تعداد کالا</label>
                              <input type="text" class="form-control" id="lastName" placeholder="" name="up-count-goods"  value="<?php echo $goods['count_goods']; ?>" required>
                              <div class="invalid-feedback">
                                Valid last name is required.
                              </div>
                            </div>
                          </div>






                          <div class="mb-3">
                            <label for="username">قیمت محصول</label>
                            <div class="input-group">

                              <input type="text" class="form-control" id="username" name="up-pr-goods"  value="<?php echo $goods['price_goods']; ?>" placeholder="قیمت" required>
                              <div class="input-group-prepend">
                                <span class="input-group-text">ریال</span>
                              </div>
                              <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                              </div>
                            </div>
                          </div>




                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1">توضیحات</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="up-des-goods"><?php echo $goods['description_goods']; ?></textarea>
                          </div>



                          
                          <div class="row">
                            <div class="col-md-5 mb-3">
                              <label for="country">دسته بندی</label>
                              <select class="custom-select d-block w-100" id="country" name="up-cat-goods" value="<?php echo $goods['cat_goods']; ?>" required>
                                <option value="">انتخاب</option>
                                <?php
                                global $conn;
                                $stmt = $conn->prepare("SELECT * FROM cat");
                                $stmt->execute();
                                foreach ($stmt->fetchAll() as $v) {
                                  if ($goods['cat_goods'] == $v['id_cat']) {
                                    echo "<option selected value=" . $v['id_cat'] . ">" . $v['name_cat'] . "</option>";
                                  } else {
                                    echo "<option value=" . $v['id_cat'] . ">" . $v['name_cat'] . "</option>";
                                  }
                                }

                                ?>
                              </select>
                              <div class="invalid-feedback">
                                دسته بندی
                              </div>
                            </div>
                          </div>

                  
                  <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fas fa-plus"></i> ویرایش کالا</button>
              </div>
              </form>

    
          <div>
        </div>

                </div>
              </div>
                              </div>


