<div class="line_header col-12"></div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="999" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row header">
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 logo text-center"><img src="PayamElectronic/Template/img/PayamElectronic.png" width="70%" alt="" srcset=""></div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4  search">
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
    <div class="col-12 col-sm-6 col-md-4 col-lg-4  contact text-center">
      <h1>پیام الکترونیک</h1>
      <p>026-32247411 <i class="fas fa-phone"></i></p>
      <p>026-32234339 <i class="fas fa-phone"></i></p>

    </div>
  </div>
</div>

<nav id="main-nav">
  <ul id="main-menu" class="sm sm-rtl sm-blue">
    <li><a href="/">خانه</a></li>
    <li><a href="#">فروشگاه</a>
      <ul>
        <li><a href="#">Sina</a></li>
        <li><a href="#">Sina</a></li>
      </ul>
    </li>
    <li><a href="#">فروشگاه</a></li>
    <li><a href="#">درباره ما</a></li>
    <!-- <li><a href="#">سبد خرید <i class="fas fa-shopping-basket"></i></a></li> -->
  </ul>
</nav>

<div class="container-fluid" style="overflow: hidden;">
  <br>
  <br>



  


  <br>
  <br>

  <div class="row">

    <div class="col-12 col-sm-12 col-md-9 col-lg-9">
      <div class="card">
        <div class="card-header">
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
                <a href="#" class="btn btt" style="margin-top: 5px;">خرید <i class="fas fa-shopping-basket"></i></a>

              </div>
            </div>

          <?php } ?>




        </div>
      </div>
    </div>



    <div class="col-12 col-sm-12 col-md-3 col-lg-3">

      <div class="row profile-main">

      <div class="card col-12">
          <div class="card-header text-center">
            <div class="img-profile">
                <a href="/profile"><i class="fas fa-user"></i></a>
            </div>
            <?php
              $name=info_authentication_users('name');
              if($name!="false"){
                echo "<a href='/profile'>".$name."</a>";
              }else{
                echo "<a href='/profile'>"."کاربر گرامی خوش آمدید"."</a>";
              }
            ?>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">محصول یک</li>
            <li class="list-group-item">محصول یک</li>
            <?php

                ?>
                            <li class="list-group-item"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">خروج</button></li>
                <?php
            ?>

          </ul>
        </div>



        <div class="card col-12">
          <div class="card-header text-center">
            پروفایل
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">محصول یک</li>
            <li class="list-group-item">محصول یک</li>
            <li class="list-group-item"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Launch static backdrop modal</button></li>
          </ul>
        </div>



    </div>
  </div>







  <br>
  <br>

  <div class="col-12 col-sm-12 col-md-9 col-lg-9">
    <div class="card">
      <div class="card-header">
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
              <img style="height: 30%; width:auto ;" src="<?php echo URL . $v['img_goods'] ?>" alt="" srcset="">
              <p><?php echo $v['name_goods']; ?></p>
              <p class="price"><?php echo $v['price_goods']; ?> ریال</p>
              <a href="#" class="btn btt" style="margin-top: 5px;">توضیحات <i class="fas fa-info"></i></a>
              <a href="#" class="btn btt" style="margin-top: 5px;">خرید <i class="fas fa-shopping-basket"></i></a>

            </div>
          </div>

        <?php } ?>




      </div>


    </div>
  </div>
</div>











</div>
</div>

<!--   
    <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="hp">
                <div><h3>1</h3></div>
                <div><h3>2</h3></div>
                <div><h3>3</h3></div>
                <div><h3>4</h3></div>
                <div><h3>5</h3></div>
                <div><h3>6</h3></div>
              </div>
          </div>
          <div class="col-sm">
            One of three columns
          </div>
          <div class="col-sm">
            One of three columns
          </div>
        </div>
      </div> -->





<div class="introduction col-12 text-center">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-4 ">
      <div>
        <i class="fas fa-shield-alt"></i>
        <p>امینت در خرید</p>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
      <div>
        <i class="fas fa-box-open"></i>
        <p>سلامت محصول</p>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
      <div>
        <i class="fas fa-headset"></i>
        <p>پشتیبانی</p>
      </div>
    </div>
  </div>
</div>