<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->


<?php include('header.php') ?>
<!-- Start WOWSlider.com BODY section -->
<section  class="me-slide">

<div id="wowslider-container0">
<div class="ws_images"><ul>
	<?php
 $sbanner="SELECT * FROM banner";
	$qryb=$connection->query($sbanner);
	while($recc=$qryb->fetch_assoc())
	{
		print "<li><img src='admin_alco/images/banner/$recc[image]' alt='Microscope' title='Microscope' id='wows0_0'/></li>";
	}
	 ?>

	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="Microscope"></a>
		<a href="#" title="Microscope"></a>
		<a href="#" title="Microscope"></a>
		<a href="#" title="Microscope"></a>
		<a href="#" title="Microscope"></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">html5 slideshow</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>
<script type="text/javascript" src="slider/engine0/wowslider.js"></script>
<script type="text/javascript" src="slider/engine0/wowslider.js"></script>
<script type="text/javascript" src="slider/engine0/script.js"></script>
<!-- End WOWSlider.com BODY section -->

</section>  <!-- about -->
<br><br>
<section>
    <div class="about-wthree" id="about">
        <div class="container-fluid">
            <div class="row ">

                <div class="col-lg-12 about-left-wthree bg-theme "  style="overflow:hidden;background-color:white" >
                      <div class="title-desc text-right pb-sm-3 wow bounceIn animated  " data-aos="fade-left" data-aos-delay="500"  >

                        <h4 class="main-title-w3pvt  text-capitalize" style="line-height:1.0;color:#42a5f5">WELCOME TO ADVANCE SCIENTIFIC AND SURGICAL CO.</h4>
                        <p class="text-white"></p>
                    </div>
                    <p data-aos="fade-down" data-aos-delay="500" class="my-3 text-right child_second wow bounceIn animated "  data-wow-duration="2s" data-wow-delay="2s" style="color:grey">
                      Advance Scientific and Surgical Co. Under the trademark of ALCO established in 1988 is one of the most progressive company that  manufacturer of Microscope, Scientific, Educational plus Medical Equipment & Instrument at AMBALA CANTT- the Scientific City of India.

                      Advance Scientific and Surgical Co. (ALCO) are leading in Indian manufacturers of reliable quality and competitively priced ISI Microscopes, Medical Instruments, Educational Instruments, Laboratory Equipments, Glass wares & Plastic wares. .

                    </p>

                    <div  data-aos="fade-right" data-aos-delay="500"class="ml-auto text-right">
                        <a href="about.php" style="background-color:#42a5f5;color:white" class="text-capitalize w3_pvt-link-bnr btn mt-sm-4">view
                            more</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </section>
    <!-- about -->
    <!-- services -->
    <section class=" services-wthreepvt position-relative" id="services">
        <div class="container">
            <div class="row">
              <br>
                <div class="col-lg-6 service-sub-gridswow"  >
                    <div class="d-flex services-box"  data-aos="fade-right" data-aos-delay="500" >

                        <div class="service-content">
                            <h4 style="line-height:3.1;">OUR MISSION</h4>
                            <span>Our goal at Alco is to provide the best possible products, solutions, services and add value to our esteemed customers.</span>

                        </div>
                    </div>
                    <div class="d-flex services-box"  data-aos="fade-left" data-aos-delay="500">

                        </span>
                        <div class="service-content">
                            <h4  style="line-height:3.1;">OUR VISION</h4><br>
                            <span>To be the major player in Scientific manufacturing products with unique attributes characterize by Quality products and services, Excellence in practices, Values that nurture human potential.</span>
                        </div>
                    </div>

                    <div class="service-bottom-img"  >
                        <img src="images/about/1.png" alt="" class="img-fluid rounded" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="services-bottom">
                        <div class="service-txt">

    <div class="d-flex services-box">
        <span class="icon">
            <i class="fa" data-blast="color"><img src="images/icons/shield.svg"></i>
        </span>
        <div class="service-content"  data-aos="fade-up">
          <h4>QUALITY MICROSCOPES</h4>
            <p>We always focus in manufacturing and delivering quality products.</p>
        </div>
    </div>
    <style media="screen">
  .services-box .icon ,@font-face {
    {
      font-size: 100px;
      font-weight: 400;
    }
  }
    </style>
    <div class="d-flex services-box">
        <span class="icon">
            <i class="fa" data-blast="color"><img src="images/icons/staff.svg"></i>
        </span>
        <div class="service-content " data-aos="fade-up" >
          <h4>PROFESSIONAL STAFF</h4>
            <p>Our professionals work as per the variegated demands of the clients.</p>

        </div>
    </div>
    <div class="d-flex services-box">
        <span class="icon">
            <i class="fa " data-blast="color"><img src="images/icons/24-hours.svg"></i>
        </span>
        <div class="service-content"  data-aos="fade-up">
          <h4>24 HOURS SUPPORT</h4>
            <p>can Send mail at info@alcoindia.com</p>

        </div>
    </div>
    <div class="d-flex services-box">
        <span class="icon">
            <i class="fa" data-blast="color"><img src="images/icons/get-money.svg"></i>
        </span>
        <div class="service-content"  data-aos="fade-up">
          <h4>AFFORDABLE PRICE</h4>
            <p>We trying to provide worldclass products at affordable price</p>

        </div>
    </div>



                    </div>
                    <div class="my-auto service-top-img">
                        <img src="images/about/iso.png" height="300px" width="300px" alt="" class="img-fluid rounded bounceIn animated"/>
                    </div>
                </div>
            </div>

    </section>
    <!-- //services -->
    <section class="team-wthree py-3  position-relative bg-theme" data-blast="bgColor" id="team">
        <div class="container py-lg-5">
            <div class="title-desc text-left pb-3">
                <h3 class="main-title-w3pvt  text-capitalize text-white">Latest products</h3>
                <p class="text-white">Explore it all. The sky is the limit!</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="carouselExampleIndicators" class="carousel slide py-lg-5" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="box5">
                                            <img src="images/t1.jpg" alt="" class=" img-fluid " data-aos="" />
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-search"></a></li>
                                                <li><a href="#" class="fa fa-link"></a></li>
                                            </ul>
                                            <div class="box-content">
                                                <h3 class="title">Williamson</h3>
                                                <span class="post">lorem ipsum</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="box5">
                                            <img src="images/t2.jpg" alt="" class=" img-fluid" />
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-search"></a></li>
                                                <li><a href="#" class="fa fa-link"></a></li>
                                            </ul>
                                            <div class="box-content">
                                                <h3 class="title">Kristiana</h3>
                                                <span class="post">lorem ipsum</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="box5">
                                            <img src="images/t2.jpg" alt="" class=" img-fluid" />
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-search"></a></li>
                                                <li><a href="#" class="fa fa-link"></a></li>
                                            </ul>
                                            <div class="box-content">
                                                <h3 class="title">Kristiana</h3>
                                                <span class="post">lorem ipsum</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="box5">
                                            <img src="images/t3.jpg" alt="" class=" img-fluid" />
                                            <ul class="
                                            icon">
                                                <li><a href="#" class="fa fa-search"></a></li>
                                                <li><a href="#" class="fa fa-link"></a></li>
                                            </ul>
                                            <div class="box-content">
                                                <h3 class="title">Williamson</h3>
                                                <span class="post">lorem ipsum</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="box5">
                                            <img src="images/t4.jpg" alt="" class=" img-fluid" />
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-search"></a></li>
                                                <li><a href="#" class="fa fa-link"></a></li>
                                            </ul>
                                            <div class="box-content">
                                                <h3 class="title">Kristiana</h3>
                                                <span class="post">lorem ipsum</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="box5">
                                            <img src="images/t4.jpg" alt="" class=" img-fluid" />
                                            <ul class="icon">
                                                <li><a href="#" class="fa fa-search"></a></li>
                                                <li><a href="#" class="fa fa-link"></a></li>
                                            </ul>
                                            <div class="box-content">
                                                <h3 class="title">Kristiana</h3>
                                                <span class="post">lorem ipsum</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- about bottom
    <div class="about-wthree1 bg-theme" data-blast="bgColor">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 about-left-wthree">
                    <div class="title-desc  pb-sm-3">
                        <h3 class="main-title-w3pvt text-white text-capitalize">discover</h3>
                        <p class="text-white">Explore it all. The sky is the limit!</p>
                    </div>
                    <p class="my-3 text-white child_second">Donec mi nulla, auctor nec sem a, ornare. Sed mi
                        tortorcomm odo a felis
                        in, fringilla tincidunt nulla. Vestibulum
                        volutpat non eros ut vulpuuctor, ornare auctor mi.Commodo a felis
                        lpuuctor nein.</p>
                    <p class="my-3 text-white child_second">Donec mi nulla, auctor nec sem a, ornare. Sed mi
                        tortorcomm odo a felis
                        in, fringilla tincidunt nulla.</p>
                    <div class="ml-auto">
                        <a href="#portfolio" class="text-capitalize text-dark w3_pvt-link-bnr btn bg-light scroll mt-sm-4">view
                            more</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="images/g4.jpg" alt="" class="img-fluid rounded" />
                </div>
            </div>
        </div>
    </div>
    about bottom -->
    <!-- pricing plans
    <section class="py-lg-5 py-4" id="plans">
        <div class="container py-md-5">
            <div class="title-desc text-right pb-sm-3">
                <h3 class="main-title-w3pvt  text-capitalize">packages</h3>
                <p>Explore it all. The sky is the limit!</p>
            </div>
            <div class="row price-row">
                <div class="col-lg-4 col-sm-6 column mb-lg-0 mb-4">
                    <div class="box" data-blast="borderColor">
                        <div class="title">
                            <i class="fa fa-paper-plane" data-blast="color"></i>
                            <h5 data-blast="color">Basic</h5>
                        </div>
                        <div class="price">
                            <h4><sup>$</sup>800</h4>
                        </div>
                        <div class="option">
                            <ul>
                                <li><i class="fa fa-check"></i> 50 Gb Space</li>
                                <li><i class="fa fa-check"></i> 5 Domain Names</li>
                                <li><i class="fa fa-check"></i> 20 Email Address</li>
                                <li><i class="fa fa-paper-times"></i> Live Support</li>
                            </ul>
                        </div>
                        <button type="button" class="btn w3ls-btn bg-theme  d-block" data-toggle="modal" aria-pressed="false"
                            data-target="#exampleModal" data-blast="bgColor">
                            book now
                        </button>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 column mb-lg-0 mb-4">
                    <div class="box" data-blast="borderColor">
                        <div class="title">
                            <i class="fa fa-plane" data-blast="color"></i>
                            <h5 data-blast="color">Standard</h5>
                        </div>
                        <div class="price">
                            <h4><sup>$</sup>1200</h4>
                        </div>
                        <div class="option">
                            <ul>
                                <li><i class="fa fa-check"></i> 10 Gb Space</li>
                                <li><i class="fa fa-check"></i> 3 Domain Names</li>
                                <li><i class="fa fa-check"></i> Unlimiteds Email Address</li>
                                <li><i class="fa fa-check"></i> Live Support</li>
                            </ul>
                        </div>
                        <button type="button" class="btn w3ls-btn bg-theme  d-block" data-toggle="modal" aria-pressed="false"
                            data-target="#exampleModal" data-blast="bgColor">
                            book now
                        </button>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6  mx-auto mt-lg-0 mt-4 column">
                    <div class="box" data-blast="borderColor">
                        <div class="title">
                            <i class="fa fa-rocket" data-blast="color"></i>
                            <h5 data-blast="color">Premium</h5>
                        </div>
                        <div class="price">
                            <h4><sup>$</sup>3000</h4>
                        </div>
                        <div class="option">
                            <ul>
                                <li><i class="fa fa-check"></i> Unlimited Gb Space</li>
                                <li><i class="fa fa-check"></i> 30 Domain Names</li>
                                <li><i class="fa fa-check"></i> Unlimited Email Address</li>
                                <li><i class="fa fa-check"></i> Live Support</li>
                            </ul>
                        </div>
                        <button type="button" class="btn w3ls-btn bg-theme  d-block" data-toggle="modal" aria-pressed="false"
                            data-target="#exampleModal" data-blast="bgColor">
                            book now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
  //pricing plans -->

    <!-- blog -->
    <section class="blog_w3ls py-lg-5" id="posts">
        <div class="container py-sm-5 py-4">
            <div class="title-desc text-right pb-sm-3">
                <h3 class="main-title-w3pvt  text-capitalize">Our Products</h3>
                <p>Explore it all. The sky is the limit!</p>
            </div>
            <div class="row space-sec">
                <!-- blog grid -->
                <div class="col-lg-3 col-md-6 mt-sm-0 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#exampleModal2" data-toggle="modal" aria-pressed="false" data-target="#exampleModal2"
                                role="button">
                                <img class="card-img-bottom" src="images/p1.jpg" alt="Card image cap">
                                <span class="fa fa-user post-icon bg-theme" data-blast="bgColor" aria-hidden="true"></span>

                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="blog-title card-title font-weight-bold">
                                <a href="#exampleModal2" data-toggle="modal" aria-pressed="false" data-target="#exampleModal2"
                                    role="button">Cras ultricies ligula sed.</a>
                            </h5>
                            <p></p>
                            <button type="button" class="btn blog-btn wthree-bnr-btn mt-3" data-blast="color"
                                data-toggle="modal" aria-pressed="false" data-target="#exampleModal2">
                                Read more
                            </button>
                        </div>
                    </div>
                </div>
                <!-- //blog grid -->
                <!-- blog grid -->
                <div class="col-lg-3 col-md-6 mt-md-0 mt-sm-5 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="#exampleModal3" data-toggle="modal" aria-pressed="false" data-target="#exampleModal3"
                                role="button">
                                <img class="card-img-bottom" src="images/p2.jpg" alt="Card image cap">
                                <span class="fa fa-user post-icon bg-theme" data-blast="bgColor" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="blog-title card-title font-weight-bold">
                                <a href="#exampleModal3" data-toggle="modal" aria-pressed="false" data-target="#exampleModal3"
                                    role="button">magna porta auris.</a>
                            </h5>
                            <p></p>
                            <button type="button" class="btn blog-btn wthree-bnr-btn mt-3" data-blast="color"
                                data-toggle="modal" aria-pressed="false" data-target="#exampleModal3">
                                Read more
                            </button>
                        </div>
                    </div>
                </div>
                <!-- //blog grid -->
                <!-- blog grid -->
                <div class="col-lg-3 col-md-6 mt-lg-0 mt-4 mx-auto">
                    <div class="card">
                        <div class="card-header p-0  position-relative">
                            <a href="#exampleModal4" data-toggle="modal" aria-pressed="false" data-target="#exampleModal4"
                                role="button">
                                <img class="card-img-bottom" src="images/p3.jpg" alt="Card image cap">
                                <span class="fa fa-user post-icon bg-theme" data-blast="bgColor" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="blog-title card-title font-weight-bold">
                                <a href="#exampleModal4" data-toggle="modal" aria-pressed="false" data-target="#exampleModal4"
                                    role="button">Cras ultricies ligula sed.</a>
                            </h5>
                            <p></p>
                            <button type="button" class="btn blog-btn wthree-bnr-btn mt-3" data-toggle="modal"
                                aria-pressed="false" data-target="#exampleModal4" data-blast="color">
                                Read more
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-lg-0 mt-4 mx-auto">
                    <div class="card">
                        <div class="card-header p-0  position-relative">
                            <a href="#exampleModal4" data-toggle="modal" aria-pressed="false" data-target="#exampleModal4"
                                role="button">
                                <img class="card-img-bottom" src="images/p3.jpg" alt="Card image cap">
                                <span class="fa fa-user post-icon bg-theme" data-blast="bgColor" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="blog-title card-title font-weight-bold">
                                <a href="#exampleModal4" data-toggle="modal" aria-pressed="false" data-target="#exampleModal4"
                                    role="button">Cras ultricies ligula sed.</a>
                            </h5>
                            <p></p>
                            <button type="button" class="btn blog-btn wthree-bnr-btn mt-3" data-toggle="modal"
                                aria-pressed="false" data-target="#exampleModal4" data-blast="color">
                                Read more
                            </button>
                        </div>
                    </div>
                </div>
                <!-- //blog grid -->
            </div>
        </div>
    </section>
    <!-- //blog -->
    <!-- team -->

    <!-- //team -->
    <!-- contact -->
    <div class="contact-wthree pt-lg-5" id="contact" style="background-color:rgba(0,64,64,0.3) color">
        <div class="container py-md-5 py-4">
            <div class="title-desc text-left pb-3">
                <h3 class="main-title-w3pvt  text-capitalize">contact</h3>

            </div>
            <div class="row py-lg-5 py-sm-4">
                <div class="col-lg-12">
                    <div class="w3_pvt-contact-top">
                        <h2>get in touch </h2>
                        <ul class="d-flex header-wthreelayouts pt-0 flex-column">
                            <li>
                                <span class="fa fa-home" data-blast="color"></span>
                                <p class="d-inline">4247/4-5, Science Market, Near
Hargolal Dharamshala,
Ambala Cantt- 133001</p>
                            </li>
                            <li class="my-3">
                                <span class="fa fa-envelope-open" data-blast="color"></span>
                                <a href="mailto:example@email.com" class="text-secondary">alcoindia88@gmail.com</a>
                            </li>
                            <li>
                                <span class="fa fa-phone" data-blast="color"></span>
                                <p class="d-inline">0171-4009756, 2634756</p>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="col-lg-12 mt-4">
                        <!-- register form grid -->
                        <div class="register-top1">
                            <form action="#" method="post" class="register-wthree">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3 pl-lg-0">
                                            <label>
                                                Full name
                                            </label>
                                            <input class="form-control" type="text" placeholder="your name" name="email"
                                                required="" data-blast="borderColor">
                                        </div>
                                        <div class="col-lg-3 my-lg-0 my-4">
                                            <label>
                                                Email
                                            </label>
                                            <input class="form-control" type="email" placeholder="example@email.com"
                                                name="email" required="" data-blast="borderColor">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>
                                                Message
                                            </label>
                                            <textarea class="form-control" type="text" placeholder="type your message" name="email"
                                                required="" data-blast="borderColor"></textarea>
                                        </div>
                                        <div class="col-lg-3 d-flex align-items-end pr-lg-0 mt-lg-0 mt-4">
                                            <button type="submit" data-blast="bgColor" class="btn btn-w3_pvt btn-block w-100 text-white font-weight-bold text-uppercase bg-theme"
                                                >Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--  //register form grid ends here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- map -->
        <div class="map p-2">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1721.7133251151358!2d76.84254099917928!3d30.338822303364836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fb6142b9d7679%3A0xb8ca7ab3da03c791!2sALCO+Microscope!5e0!3m2!1sen!2sin!4v1541240622060" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
        <!--// map-->
    </div>
    <!-- //contact -->
  <?php include('footer.php') ?>
