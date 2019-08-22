<?php include 'header.php';?>
<section class="wthree-row w3-gallery cliptop-portfolio-wthree pt-lg-5 me-slide" id="portfolio">
    <div class="container-fluid" >
        <div class="title-desc  pb-3">


            <h3 class="main-title-w3pvt  text-capitalize" style="color:#42a5f5;">Gallery</h3>

        </div>
        <ul class="demo row py-lg-5 py-sm-4 pb-4">
          <?php
         $sgallery="SELECT * FROM gallery";
          $qryg=$connection->query($sgallery);
          while($recc=$qryg->fetch_assoc())
          {
            print "
            <li class='col-lg-3 col-sm-6'>
                <div class='gallery-grid1'>
                    <img src='admin_alco/images/gallery/$recc[image]' alt='' class='img-fluid img-thumbnail' />
                </div>
            </li>";

          }
           ?>
            
        </ul>
    </div>
</section>












<?php include 'footer.php'; ?>
