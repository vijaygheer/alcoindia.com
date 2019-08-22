
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Products</title>


<?php include 'header.php'; ?>
<section class="blog_w3ls py-lg-5 me-slide" id="posts">
    <div class="container py-sm-5 py-4">
        <div class="title-desc text-right pb-sm-3">
            <h3 class="main-title-w3pvt  text-capitalize">PRODUCTS</h3>

        </div>

        <div class="row space-sec">
            <!-- blog grid -->
            <div class="col-lg-3">
            <div class="col-lg-12">
              <p  style="font-weight:800">SUBCATEGORIES</p>
              <hr>
              <?php
              $cid = $_GET['ctid'];
             $subcat="SELECT * FROM subcategory where catid= $cid";
              $qrys=$connection->query($subcat);
              while($recc=$qrys->fetch_assoc())
              {
                print"<a class='subcate' href='product.php?ctid=$cid&sid=$recc[id]'>$recc[subcategory]</a> ";
              }
               ?>
            </div>
              </div>
            <!-- //blog grid -->
            <!-- blog grid -->
            <div class="col-lg-9">
            <div class="col-lg-4 col-md-6 mt-md-0 mt-sm-5 mt-4" style="position:relative;float:left">
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
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-4 " style="position:relative;float:left">
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
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-4 " style="position:relative;float:left">
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
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-4 " style="position:relative;float:left">
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
            </div>  <div class="col-lg-4 col-md-6 mt-lg-0 mt-4 " style="position:relative;float:left">
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
              </div>  <div class="col-lg-4 col-md-6 mt-lg-0 mt-4 " style="position:relative;float:left">
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
              </div>

            <!-- //blog grid -->
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
