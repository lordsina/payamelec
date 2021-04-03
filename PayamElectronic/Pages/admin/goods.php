<div class="col-lg-8 col-12 goods_c">
                        <div class="row text-center">
                                <?php
                                global $conn;

                                $stmt = $conn->prepare("SELECT * FROM goods");
                                $stmt->execute();
                                $row= $stmt->rowCount();
                                $stmt = $conn->prepare("SELECT * FROM goods limit 10");
                                $stmt->execute();

                                    foreach($stmt->fetchAll() as $v) {
                                ?>
                            <div class=" col-6 col-lg-2 mb-4">
                                <div class="card text-center">

                                <img  class="card-img-top img-thumbnail" style="height: 200px; width:auto ;" src="<?php echo URL.$v['img_goods']?>" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $v['name_goods'];?></h5>
                                    <p class="card-text"><?php echo $v['description_goods'];?></p>
                                    <p class="card-text"><?php echo $v['price_goods'];?> ریال </p>
                                    <a href="/admin/goods/edit/<?= $v['id_goods'];?>" class="btn btn-primary">ویرایش</a>
                                    <a onclick="return confirm('ایا حذف شود؟');" href="/admin/goods/delete/<?= $v['id_goods'];?>" class="btn btn-danger">حذف</a>
                                </div>
                                <div class="card-footer">
                                        <small class="text-muted"><?php echo $v['date_goods'];?></small>
                                    </div>
                                </div>
                            </div>

                            <?php }?>
                        </div>
















        

        </div>
    </div>
                                   
</div>
