<div class="line_header col-12"></div>




<div class="container-fluid">
  <div class="row header">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 logo text-center"><img src="PayamElectronic/Template/img/PayamElectronic.png" width="70%" alt="" srcset=""></div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4  search">
      <form class="search-form">
        <input type="search" value="" placeholder="جستجو" class="search-input">
        <button type="submit" class="search-button">
          <svg class="submit-button">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
          </svg>
        </button>
      </form>

      <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
        <symbol id="search" viewBox="0 0 32 32">
          <path d="M 19.5 3 C 14.26514 3 10 7.2651394 10 12.5 C 10 14.749977 10.810825 16.807458 12.125 18.4375 L 3.28125 27.28125 L 4.71875 28.71875 L 13.5625 19.875 C 15.192542 21.189175 17.250023 22 19.5 22 C 24.73486 22 29 17.73486 29 12.5 C 29 7.2651394 24.73486 3 19.5 3 z M 19.5 5 C 23.65398 5 27 8.3460198 27 12.5 C 27 16.65398 23.65398 20 19.5 20 C 15.34602 20 12 16.65398 12 12.5 C 12 8.3460198 15.34602 5 19.5 5 z" />
        </symbol>
      </svg>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4  contact text-center">
      <div class="header-profile">
          <div class="row ht">

            <div class="profile-users-header col-6 col-sm-6 col-md-6 col-lg-6">
              <a href="/login">
              <button type="button" class="btn btn-primary" data-toggle="modal">
              <i class="fas fa-user"></i>
              <?php if(authentication_users()!="invalid"){
                  ?>
                    <span><?php echo info_user($_SESSION['id-user'])['name'];;?> خوش امدید</span>
                <?php }else{?>
              <span>ورود به حساب</span>
                <?php }?>
              </button>
              </a>
            </div>

            <div class=" basket-p col-6 col-sm-6 col-md-6 col-lg-6">
              <!-- Button trigger modal -->

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
              <span class="badge badge-light"><?php echo count($_SESSION['goods']); ?></span>
              <i class="fas fa-shopping-basket"></i>
              <span>سبد خرید</span>
              </button>
            </div>

          </div>
          





        </div>










        
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="999" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <p>سبد خرید<i class="fas fa-shopping-basket"></i></p>
                </div>

                <div class="modal-body">
                <ul class="list-group list-group-flush">
                <li class="list-group-item text-center">
                                <span style="float: left;">نام محصول</span>
                                <span style="float: right;">تعداد</span>
                                <span>قیمت</span>
                              </li> 
                               
                  <?php
                        global $conn;
                        
                        foreach($_SESSION['goods'] as $key=>$animal)
                        {   
                            foreach ($animal as $attribute => $value)
                            {
                              $stmt = $conn->prepare("SELECT * FROM goods WHERE id_goods=$attribute");
                              $stmt->execute();
                              foreach ($stmt->fetchAll() as $v) {
                                ?>

                                <li class="list-group-item text-center">
                                <a href="/basket/delete/<?php echo $v['id_goods']; ?>"><i style="color:#CE2F33; float:left;" class="fas fa-minus "></i></a>
                                <input type="number" class="form-control text-right" style=" width: 60px; display: inline;" name="" id="">
                                <span><?php echo " ریال ".$v['price_goods']; ?> </span>

                                <a style="float:left;" href="/basket/<?php echo $v['id_goods']; ?>"><?php echo $v['name_goods']; ?></a>  </li> 
                               
                                <?php
                              }
                        
                            }
                        }
                  ?>
                                                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                  <button type="button" class="btn btn-primary">پرداخت</button>
                </div>
              </div>
            </div>
          </div>

    </div>
  </div>
</div>





<div class="col-12 col-sm-12 col-md-12 col-lg-12 maingoods">
<div class="row">

  <div class="col-sm-3 text-center" >
    <div class="card c1">
      <div class="card-body">
        <h5 class="card-title"><a href="/upload"> آپلود سنتر</a></h5>
      </div>
    </div>
  </div>


  <div class="col-sm-3 text-center">
    <div class="card c2">
      <div class="card-body">
        <h5 class="card-title">آموزش</h5>
      </div>
    </div>
  </div>


  <div class="col-sm-3 text-center">
    <div class="card c3">
      <div class="card-body">
        <h5 class="card-title">بک لایت</h5>
      </div>
    </div>
  </div>


  <div class="col-sm-3 text-center" >
    <div class="card c4">
      <div class="card-body">
        <h5 class="card-title">کنترولرها</h5>
      </div>
    </div>
  </div>

</div>
</div>


    <div class="col-12 col-sm-12 col-md-12 col-lg-12 maingoods">
    
      <div class="card">
        <div class="card-header text-center">
          محصولات جدید
        </div>
        <div class="your-class  goods">


          <?php
          global $conn;
          $stmt = $conn->prepare("SELECT * FROM goods limit 10");
          $stmt->execute();
          foreach ($stmt->fetchAll() as $v) {
          ?>


            <div class="item-goods">
              <div style="padding: 5px 5px; height: 320px; overflow:hidden;">
                <img style="height: 30%; width:auto ;" src="<?php echo URL . $v['img_goods'] ?>" alt="" srcset="" width="150px">
                <p><?php echo $v['name_goods']; ?></p>
                <p class="price"><?php echo number_format($v['price_goods']); ?> ریال</p>
                <a href="#" class="btn btt" style="margin-top: 5px;">توضیحات <i class="fas fa-info"></i></a>
                <a href="/basket/add/<?php echo $v['id_goods'];?>" class="btn btt" style="margin-top: 5px;">خرید <i class="fas fa-shopping-basket"></i></a>
              </div>
            </div>

          <?php } ?>




        </div>
      </div>
    </div>




<div class="introduction col-12 text-center">
  <div class="row">
    <div class="col-12 col-sm-12 col-md-4 col-lg-4 ">
      <div>
        <i class="fas fa-shield-alt"></i>
        <p>امینت در خرید</p>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
      <div>
        <i class="fas fa-box-open"></i>
        <p>سلامت محصول</p>
      </div>
    </div>
    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
      <div>
        <i class="fas fa-headset"></i>
        <p>پشتیبانی</p>
      </div>
    </div>
  </div>
</div>