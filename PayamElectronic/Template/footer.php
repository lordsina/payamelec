    
      <div class="footer-shape">
      </div>
    <div class="footer col-12 text-center">

      <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 text-center info"> 
            <h1>پیام الکترونیک کرج</h1>
            <h2>پخش عمده قطعات الکترونیکی در کرج</h2>
            <div class="line"></div>
            <div class="info-tell">
                <p><span>+9826-32247411</span><span> : شماره تماس <i class="fas fa-phone-square-alt"></i></span> </p>
                <p><span>+9826-32234339</span><span> : شماره تماس <i class="fas fa-phone-square-alt"></i></span> </p>
                <p><span>+9826-32236266</span><span> : شماره فکس <i class="fas fa-fax"></i></span> </p>
            </div>
            <div class="line"></div>
            <p><span> آدرس <i class="fas fa-map-marker-alt"></i></span> </p>
            <p class="address">کرج - خیابان شهید بهشتی - پاساژ جدیی - پلاک 30</p>

        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 "> 

          <div class="row">
            <div class="col-12 text-center"><img src="PayamElectronic/Template/img/PayamElectronic.png" width="70%" alt="" srcset=""></div>
            <div class="line"></div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
              <p>ما در همه جا!</p>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d404.4261770733836!2d51.00388407838146!3d35.81442941155623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8dbf350f148b81%3A0xbe82c92dcbed4944!2z2b7bjNin2YUg2KfZhNqp2KrYsdmI2YbbjNqpINqp2LHYrA!5e0!3m2!1sen!2s!4v1598610042535!5m2!1sen!2s" width="90%" height="auto" frameborder="0" style="border:0; border-radius:5px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>
          
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-4"> 
          
          <div class="row">
              <div class="col-12 col-sm-6 col-md-4 col-lg-4 text-center">

              </div>
              <div class="col-12 col-sm-6 col-md-4 col-lg-4 text-center">




              
              </div>
          </div>
      </div>
      </div>
    </div>
    
    <footer>
    <br>
        <p>&copy;تمامی حقوق این وب سایت مطلق به<a href="<?=URL?>">  پیام الکترونیک </a>میباشد.</p>
    <br>
    </footer>
    <div class="line_header col-12"></div>
    </div>

 
    <script>
  function initFreshChat() {
    window.fcWidget.init({
      token: "1e140a8d-0b6c-4c21-acd1-68aec34846bc",
      host: "https://wchat.eu.freshchat.com"
    });
  }
  function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.eu.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
</script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="<?=URL?>PayamElectronic/Template/js/jquery.js"></script>
    <script type="text/javascript" src="<?=URL?>PayamElectronic/Template/js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="<?=URL?>PayamElectronic/Template/js/jquery.smartmenus.js"></script>
    <script src="https://kit.fontawesome.com/9c83caefaf.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function(){ 
        document.getElementById("load").style.display = "none";
        document.getElementById("main").style.display = "block";
    });
        $(function() {
            $('#main-menu').smartmenus({
                subMenusSubOffsetX: 1,
                subMenusSubOffsetY: -8
            });
        });
    $('.hp').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
    });


    $('.your-class').slick({
  dots: true,
  infinite: true,
  speed: 300,
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
});


$('.your-class1').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

    </script>
    </body>
</html>