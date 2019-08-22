<?php
include('include/sql.php');
 ?>
 <!DOCTYPE html>
 <html lang="zxx">

 <head>
     <title>Alco_India New Site</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8" />
<meta name="keywords" content="" />
<!--
<script>
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
-->
<!-- Custom Theme files -->
<!--------animation file --------->




<link rel="stylesheet" href="css/aos-animation.css">
<link rel="stylesheet" href="aos.css">



<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<!-- color switch -->
<link href="css/blast.min.css" rel="stylesheet" />
<!-- portfolio -->
<link href="css/portfolio.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<!-- font-awesome icons -->
<link href="css/font-awesome.min.css" rel="stylesheet">
<!-- //Custom Theme files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
<!-- //online-fonts -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="slider/engine0/style.css" />
<script type="text/javascript" src="slider/engine0/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
</head>









<body    data-spy="scroll" data-offset="50">



  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
  AOS.init();
  AOS.init();

  // You can also pass an optional settings object
  // below listed default settings
  AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

  });
  </script>
<!-- blast color scheme
<div class="blast-box">
    <div class="blast-frame">
        <p>color schemes</p>
        <div class="blast-colors d-flex justify-content-center">
            <div class="blast-color">#ff4f81</div>
            <div class="blast-color">#77ba00</div>
            <div class="blast-color">#ffa900</div>
            <div class="blast-color">#2ec4b6</div>
            <div class="blast-color">#42a5f5</div>
            <!-- you can add more colors here
        </div>
        <p class="blast-custom-colors">Choose Custom color</p>
        <input type="color" name="blastCustomColor" value="#cf2626">

    </div>
    <div class="blast-icon"><i class="fa fa-cog" aria-hidden="true"></i></div>

</div>
<!---blast color scheme -->
<!-- top header -->
<div class="header-top bg-theme" data-blast="bgColor">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="d-flex header-w3_pvt">
                    <li>
                        <span class="fa fa-envelope-open"></span>
                        <a href="#" class="text-white">alcoindia88@gmail.com</a>
                    </li>
                    <li>
                        <span class="fa fa-phone"></span>
                        <p class="d-inline text-white">+91-9812034756</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 header-right-w3_pvt">
                <ul class="d-flex header-w3_pvt justify-content-lg-end">
                    <li><button type="button" class="btn w3ls-btn d-block" data-toggle="modal" aria-pressed="false"
                            data-target="#exampleModal1">
                            <span class="fa fa-sign-in"></span>Register
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn w3ls-btn btn-2  d-block" data-toggle="modal" aria-pressed="false"
                            data-target="#exampleModal">
                            <span class="fa fa-lock"></span> Sign in
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- //top header -->



<!-- banner -->
<div id="home">
    <!-- header -->
    <header >
        <nav class="navbar navbar-expand-lg navbar-light "  >
            </br>
                <a class="navbar-brand text-white" href="index.php">
                    <img src="images/logo.png" alt="">
                </a>

            <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-lg-auto text-center">
                    <li class="nav-item active  mr-lg-3 mt-lg-0 mt-sm-3">
                        <a class="nav-link" href="index.php">HOME

                        </a>
                    </li>
                    <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item dropdown mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            PRODUCTS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <?php
                         $sa_cat="SELECT * FROM category";
                          $qryc=$connection->query($sa_cat);
                          while($recc=$qryc->fetch_assoc())
                          {
                            print"<a class='dropdown-item' href='product.php?ctid=$recc[id]'>$recc[category]</a> ";
                          }
                           ?>



                        </div>
                    </li>
                    <li class="nav-item  mt-lg-0 mt-3">
                        <a class="nav-link " href="certification.php">CERTIFICATION</a>
                    </li>
                    <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link " href="gallery.php">GALLERY</a>
                    </li>
                    <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link " href="index.php#contact">CONTACT</a>
                    </li>
                </ul>
            </div>

        </nav>

    </header>



    <!-- //header -->
