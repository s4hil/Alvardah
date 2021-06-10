<?php
  require_once './admin/phpStuff/coreFunctions.php';
  require './components/header.php';
?>



      <section >
         <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#main_slider" data-slide-to="0" class="active"></li>
               <li data-target="#main_slider" data-slide-to="1"></li>
               <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="row marginii">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="carousel-caption ">
                              <h1>Welcome to <strong class="color">Our Shop</strong></h1>
                              <p>Your Own Kashmiri Clothing Brand</p>
                              <a class="btn btn-lg btn-primary" href="#products" role="button"><i class="fas fa-shopping-cart"></i> Buy Now</a>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box">
                              <figure><img src="./pix/slider-img-1.png" alt="img"/></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row marginii">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="carousel-caption ">
                              <h1>Design Your Own <strong class="color">Clothes</strong></h1>
                              <p>Alvardah Promises You Quality Products Just As You Want Them To Be.</p>
                              <a class="btn btn-lg btn-primary" href="#products" role="button">Buy Now</a>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box ">
                              <figure><img src="./pix/slider-img-2.png" alt="img"/></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row marginii">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="carousel-caption ">
                              <h1>Awesome <strong class="color">Service</strong></h1>
                              <p>We Make Sure The Product Reaches You In Time And In Best Condition.</p>
                              <a class="btn btn-lg btn-primary" href="#products" role="button">Buy Now</a>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box">
                              <figure><img src="./pix/slider-img-3.png" alt="img"/></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class='fa fa-angle-left'></i></a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class='fa fa-angle-right'></i>
            </a>
         </div>
      </section>
      <!-- plant -->
      <div id="plant" class="section  product">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage text-center">
                     <a name="products"></a><h2><strong class="black"> Our</strong>  Products</h2>
                     <span>Providing customers with quality products is our main concern. We make sure that your products are crafted by our best men.</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
         <div class="clothes_main section" style="background: #283655;">
          <div class="container">
            <div class="row">
               
              <?php 
                // Fetching Products
                global $conn;
                $sql = "SELECT * FROM `inventory`";
                $result = mysqli_query($conn, $sql);

                while ($item = mysqli_fetch_array($result)) {
              ?>

               <!--       Start Product Box        -->

                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" style="margin-top: 25px;">
                     <div class="product" style="background-color: #f1f1f1;">
                      <h2 style="margin-top: -40px;"><?php echo $item['name']; ?></h2><br>
                        <figure><img src="./admin/products/<?php echo $item['pic'];?>" width="300" height="300px" alt="img"/></figure>
                        <br><br>
                        <h2>
                           <a href="./buyProduct.php?id=<?php echo $item['productid']; ?>" 
                              class="btn btn-success buy-btn" style="width: 100%;display: flex;justify-content: space-between;align-items: center;">
                              <span> &#8377; <?php echo $item['price'] ; ?></span><i class="fas fa-shopping-cart"></i><span>Buy</span>
                           </a><br>
                           <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info show-details-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                              Show Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel" style="font-size: larger;"><?php echo $item['name'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  
                                    <!-- PRODUCT POPUP MODAL -->

                                    <div class="container">
                                      <div class="product-imgs">

                                           <img width="100%" src="./admin/products/<?php echo $item['pic'];?>" width="150">
                                      
                                      </div>
                                    </div>

                                    <p align="left">
                                      <b>About Product: </b> 
                                      <?php echo $item['detail']; ?>
                                    </p>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </h2>
                     </div>
                     
                  </div>

               <!------       End Product Box          ------>
             <?php } ?>
            </div>
             </div>
            </div>
           </div>
      </div>
      <!-- end plant -->


      <section >
         <div class="container">
            <div class="row">
               <div class="col-md-12 "><br><br><br>
                  <div class="titlepage text-center">
                     <div class="titlepage">
                        <h2 style="color: #136af8;"><strong class="black"> Best </strong>  Deal</h2>
                        <span>Grab The Offer Now!</span>
                      </div>
                  </div>
               </div>
            </div>
         </div>

         <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">  

            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="row marginii">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                          <?php
                            global $conn;
                            $sql = "SELECT * FROM `bestproduct` WHERE `id` = '1'";
                            $bestProd = mysqli_fetch_array(mysqli_query($conn, $sql));
                          ?>


                           <div class="carousel-sporrt_text ">
                              <h1 class="sporrt_text"><?php echo $bestProd['name']; ?></h1>
                              <p  class="lorem_text"><?php echo $bestProd['details']; ?></p>
                              <div class="btn_main">
                                 <a class="btn btn-lg btn-primary" href="buyProduct.php?id=<?php echo $bestProd['productid']; ?>" role="button">
                                    <i class="fas fa-shopping-cart"></i>&nbsp;
                                    <?php echo $bestProd['price']; ?>&nbsp;
                                    Buy
                                  </a>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                           <div class="img-box" style="background: #f1f1f1">
                              <figure><img src="./admin/products/<?php echo $bestProd['pic']; ?>" style="max-width: 100%; border: 15px solid #fff;"/></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      </section>
      </div>
      <!-- end about -->
      <!--Our  Clients -->
      <div id="plant" class="section_Clients layout_padding padding_bottom_0"><a name="about_us"></a>
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <div class="titlepage">
                        <h2 style="color: #136af8;"><strong class="black"> About </strong>  Us</h2>
                      </div>
                     <span style="text-align: center;">We are a group of people who are determined, passionate, and hardworking </span>
                  </div>
               </div>
            </div>
         </div>
      </div>
            <div class="section Clients_2 layout_padding padding-top_0">
               <div class="container">
                  <div class="row">
                     <div class="col-sm-12">

                        <div id="testimonial" class="carousel slide" data-ride="carousel">

              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#testimonial" data-slide-to="0" class="active"></li>
                
              </ul>
              
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="titlepage">

                    <?php
                      global $conn;
                      $bio = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `about` WHERE id = '1'"));
                    ?>
                           <div class="john">
                              <div class="john_image"><img src="./admin/pix/<?php echo $bio['pic'] ?>" style="max-width: 100%;"></div>
                              <div class="john_text"><?php echo $bio['name'] ?><span style="color: #fffcf4;">(CEO)</span></div>
                              <p class="lorem_ipsum_text"><?php echo $bio['bio'] ?></p>
                              <div class="icon_image"><img src="images/icon-1.png"></div>
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
      </div>
   </div>
      <!-- end Our  Clients -->
      <!-- start Contact Us-->

      <div id="plant" class="contact_us layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                    <h2><strong class="black"> Contact</strong>  Us</h2>
                     <span style="text-align: center;">Feel free to contact us anytime, your feedback makes us better.</span>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div style="background: #283655;" class="contact_us_2 layout_padding paddind_bottom_0">
         <a name="contact_us"></a>
         <div class="container">
            <div class="row">
               <div class="col-md-6">

                <?php
                  global $conn;
                  $quote = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `quotes` WHERE `id`= '1'")); 
                ?>

                  <div class="soc_text" style="background: #d0e1f9; color: #1e1f26;">
                     “<?php echo $quote['quote']; ?>”<br> – <?php echo $quote['author']; ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="email_btn">
                     <form action="/action_page.php">
                        <div class="form-group">
                           <input type="text" class="form-control form-control-sm" placeholder="Name" name="Name">
                        </div>
                        <div class="form-group">
                           <input  type="text" class="form-control form-control-sm" placeholder="Email" name="Email">
                        </div>
                        <div class="form-group">
                           <input  type="text" class="form-control form-control-sm" placeholder="Phone" name="Phone">
                        </div>
                        <div class="form-group">
                           <input  type="text" class="form-control form-control-sm" placeholder="Message" name="text3">
                        </div>
                         <div class="submit_btn">
                            <button type="submit" class="btn btn-primary" style="background: #081b30; color: #fff; padding: 11px;">Send</button>
                         </div>
                      </form>
                  </div>
               </div>
            </div>
            <br><br>
         </div>
      </div>

      
<?php

require './components/footer.php';

?>