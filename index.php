<?php
session_start();
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CMontserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern context-dark" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <!-- Brand<a class="brand" href="index.php"><img class="brand-logo-dark" src="images/mujer-con-pelo-largo(1).png" alt="" width="250" height="111"/><img class="brand-logo-light" src="images/mujer-con-pelo-largo(1).png" alt="" width="250" height="111"/></a> -->
                    <a class="brand nuevo-brand" href="index.php">Sofía Nadal Estilistas</a>
                  </div>
                </div>
                <div class="rd-navbar-main-element"> 
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <?php
                    if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
                    ?>
                        
                        <ul class="rd-navbar-nav">
                          <li class="rd-nav-item"><a class="rd-nav-link" href="#about">Mi Cuenta</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="#pricing">Reservar Cita</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a>
                          </li>
                        </ul>
                    <?php
                    } else {
                        // Si no está autenticado, incluye el formulario de inicio de sesión
                    ?>
                        <ul class="rd-navbar-nav">
                          <li class="rd-nav-item"><a class="rd-nav-link" href="#about">About</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="#pricing">Pricing</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="#contacts">Contacts</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="login.php">Login</a>
                          </li>
                        </ul>
                    <?php
                    }

                    ?>
                    
                  <!-- </div> -->
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!--include ../sections/_header-sidebar-->
      <!-- Swiper-->
      <section class="section section-lg section-main-bunner" id="home">
        <div class="main-bunner-img" style="background-image: url(&quot;images/bg-bunner-2.jpg&quot;); background-size: cover;"></div>
        <div class="main-bunner-inner">
          <div class="container">
            <div class="row row-50 justify-content-lg-center align-items-lg-center">
              <div class="col-lg-12">
                <div class="bunner-content-modern text-center">
                  <div class="big-text decorative-line wow fadeInUp" data-wow-delay=".075s">Fashion & style</div>
                  <h5 class="wow fadeInUp" data-wow-delay="1s"> Curl Hair Salon, established in 1999, is an oasis of beauty, hair <br class="d-none d-lg-block"> indulgence, and the synonym of stylish haircuts.</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-sm context-dark bg-secondary">
        <div class="container">
          <!-- RD Mailform-->
          <form class="rd-form rd-mailform form-lg form-1" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
            <div class="form-wrap-outer wow fadeIn"><span class="fw-regular body-font-size"> NAME</span>
              <div class="form-wrap form-wrap-main">
                <input class="form-input" id="form-1-destination" type="text" name="destination" data-constraints="@Required">
                <label class="form-label" for="form-1-destination">Your name</label>
              </div>
            </div>
            <div class="form-wrap-outer wow fadeIn" data-wow-delay=".025s"><span class="fw-regular body-font-size">PHONE</span>
              <div class="form-wrap form-wrap-main">
                <input class="form-input" id="form-1-phone" type="text" name="phone" data-constraints="@Numeric">
                <label class="form-label" for="form-1-phone">Your phone number</label>
              </div>
            </div>
            <div class="form-wrap-outer wow fadeIn" data-wow-delay=".05s"><span class="fw-regular body-font-size">DATE</span>
              <div class="form-wrap form-wrap-main">
                <input class="form-input" id="form-1-date" type="text" name="date" data-constraints="@Required" data-time-picker="date">
                <label class="form-label" for="form-1-date">12/20/22</label>
              </div>
            </div>
            <div class="form-button wow fadeIn" data-wow-delay=".075s">
              <button class="button button-md button-primary" type="submit">Make an appointment</button>
            </div>
          </form>
        </div>
      </section>
      <section class="section section-lg bg-default">
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-md-9 col-lg-7 wow-outer">
              <div class="wow slideInDown">
                <h2>Featured Offers</h2>
                <p>We offer a complete range of hair services including haircuts & styling, coloring, eyebrow <br class="d-none d-lg-block"> and eyelash tinting, perming, hair straightening, and a lot more.</p>
              </div>
            </div>
          </div>
          <div class="row row-40">
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="team-minimal">
                  <div class="team-minimal-figure"><img src="images/team-minimal-1-370x395.jpg" alt="" width="370" height="395"/>
                    <ul class="team-minimal-soc-list">
                      <li><a class="button button-sm button-secondary" href="#">book now</a></li>
                    </ul>
                  </div>
                  <div class="team-minimal-caption">
                    <h4 class="text-uppercase"><a class="team-name" href="#">haircuts</a></h4>
                    <h6 class="text-primary text-uppercase">Creating Your Image </h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="team-minimal">
                  <div class="team-minimal-figure"><img src="images/team-minimal-2-370x395.jpg" alt="" width="370" height="395"/>
                    <ul class="team-minimal-soc-list">
                      <li><a class="button button-sm button-secondary" href="#">book now</a></li>
                    </ul>
                  </div>
                  <div class="team-minimal-caption">
                    <h4 class="text-uppercase"><a class="team-name" href="#">hairstyles</a></h4>
                    <h6 class="text-primary text-uppercase">Achieving the Best Look</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="team-minimal">
                  <div class="team-minimal-figure"><img src="images/team-minimal-3-370x395.jpg" alt="" width="370" height="395"/>
                    <ul class="team-minimal-soc-list">
                      <li><a class="button button-sm button-secondary" href="#">book now</a></li>
                    </ul>
                  </div>
                  <div class="team-minimal-caption">
                    <h4 class="text-uppercase"><a class="team-name" href="#">Coloring</a></h4>
                    <h6 class="text-primary text-uppercase">Any Colors You Can Imagine</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="section section-lg section-lg-1 bg-default" id="gallery">
        <div class="row justify-content-center text-center">
          <div class="col-12 wow slideInUp">
            <h2>Our Portfolio</h2>
            <div class="small-text">Check out the full portfolio of our works including haircuts, hair extensions, and<br class="d-none d-lg-block"> more. Everything you see here was performed by our stylists and hairdressers.</div>
          </div>
        </div>
        <div class="row row-30" data-isotope-group="gallery">
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow-outer">
            <div class="wow slideInDown">
              <div class="gallery-item-classic"><img src="images/gallery-1-463x383.jpg" alt="" width="463" height="383"/>
                <div class="gallery-item-classic-caption"><a href="images/gallery-1-original.jpg" data-lightgallery="item">zoom</a></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow-outer">
            <div class="wow slideInDown">
              <div class="gallery-item-classic"><img src="images/gallery-2-463x383.jpg" alt="" width="463" height="383"/>
                <div class="gallery-item-classic-caption"><a href="images/gallery-2-original.jpg" data-lightgallery="item">zoom</a></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow-outer">
            <div class="wow slideInDown">
              <div class="gallery-item-classic"><img src="images/gallery-3-463x383.jpg" alt="" width="463" height="383"/>
                <div class="gallery-item-classic-caption"><a href="images/gallery-3-original.jpg" data-lightgallery="item">zoom</a></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow-outer">
            <div class="wow slideInDown">
              <div class="gallery-item-classic"><img src="images/gallery-12-463x383.jpg" alt="" width="463" height="383"/>
                <div class="gallery-item-classic-caption"><a href="images/gallery-4-original.jpg" data-lightgallery="item">zoom</a></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow-outer">
            <div class="wow slideInDown">
              <div class="gallery-item-classic"><img src="images/gallery-9-463x383.jpg" alt="" width="463" height="383"/>
                <div class="gallery-item-classic-caption"><a href="images/gallery-7-original.jpg" data-lightgallery="item">zoom</a></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow-outer">
            <div class="wow slideInDown">
              <div class="gallery-item-classic"><img src="images/gallery-13-463x383.jpg" alt="" width="463" height="383"/>
                <div class="gallery-item-classic-caption"><a href="images/gallery-13-original.jpg" data-lightgallery="item">zoom</a></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow-outer">
            <div class="wow slideInDown">
              <div class="gallery-item-classic"><img src="images/gallery-11-463x383.jpg" alt="" width="463" height="383"/>
                <div class="gallery-item-classic-caption"><a href="images/gallery-5-original.jpg" data-lightgallery="item">zoom</a></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 wow-outer">
            <div class="wow slideInDown">
              <div class="gallery-item-classic"><img src="images/gallery-8-463x383.jpg" alt="" width="463" height="383"/>
                <div class="gallery-item-classic-caption"><a href="images/gallery-8-original.jpg" data-lightgallery="item">zoom</a></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-xl section-xl-2 context-dark bg-secondary" id="about">
        <div class="container">
          <div class="row row-50 justify-content-lg-between">
            <div class="col-lg-6 text-center text-lg-start">
              <div class="wow slideInLeft">
                <div class="decorative-square"><img src="images/home-3-1-483x400.jpg" alt="" width="483" height="400"/>
                </div>
              </div>
            </div>
            <div class="col-lg-5 wow-outer block-1 text-center text-lg-start">
              <div class="wow slideInRight">
                <h2>About Us</h2>
                <p class="p1">Curl is one of the premier hair salons in Los Angeles, frequented not only by women but by men and kids as well.</p>
                <p>Our hair salon has earned an incredible reputation as our professional team of hairstylists continues to work wonders on clients’ hair and enhance their assets through our services.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="section section-lg section-lg-4 bg-gray-1" id="pricing">
        <div class="container">
          <h2 class="text-center wow slideInUp">Pricing</h2>
          <div class="row offset-top-1">
            <div class="col-12 wow slideInUp">
              <div class="tabs-custom tabs-horizontal tabs-classic" id="tabs-1">
                <ul class="nav nav-tabs nav-tabs-classic">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-bs-toggle="tab">haircuts</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-bs-toggle="tab">hairstyling</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-bs-toggle="tab">coloring</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-1-1">
                    <div class="box-event-modern">
                      <div class="event-item-modern event-active">
                        <p class="event-time">$10.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Ladies’ Haircut</a></h4>
                        <div class="event-item-modern-text">
                          <p>Curl provides a long list of salon services that will have women looking fabulous. Women can treat themselves to just a haircut or they can also choose from any of our expert services.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$9.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Men’s Haircut</a></h4>
                        <div class="event-item-modern-text">
                          <p>A men’s haircut comes with a refreshing shampoo, stimulating scalp massage and an essential oil hot towel treatment.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$11.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Kids’ Haircut</a></h4>
                        <div class="event-item-modern-text">
                          <p>A trip to our salon is always enjoyable for kids of all ages. While we service clients of all ages, the experience for children will make them feel special.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$8.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Senior Haircut</a></h4>
                        <div class="event-item-modern-text">
                          <p>Our staff puts a great amount of pride in our senior haircut service as we believe people simply get better with age. Style and elegance can be yours at discounted senior prices.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-2">
                    <div class="box-event-modern">
                      <div class="event-item-modern event-active">
                        <p class="event-time">$20.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Blowout</a></h4>
                        <div class="event-item-modern-text">
                          <p>A full blowout service at Curl  includes two washes, one wash using clarifying shampoo, and the other is completed with a Blowout Shampoo and thermal protectant.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$16.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Curls</a></h4>
                        <div class="event-item-modern-text">
                          <p>Enjoy a great shape with a customized curly cut, trim or shaping that's designed to bring out the best in your curls and express your individuality.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$15.89</p>
                        <h4 class="event-item-modern-title"><a href="#">UpDo</a></h4>
                        <div class="event-item-modern-text">
                          <p>An updo is a hairstyle that is completely pinned up. Whether it is a high ponytail with braiding included, a low side bun with twists, or anything in between, we can manage it.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$14.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Event HairStyling</a></h4>
                        <div class="event-item-modern-text">
                          <p>If you have a special event coming up, then our event styling services for your hair are just what you need. Our team of stylists will make you look your best.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-3">
                    <div class="box-event-modern">
                      <div class="event-item-modern event-active">
                        <p class="event-time">$10.89</p>
                        <h4 class="event-item-modern-title"><a href="#">All-over Hair Color</a></h4>
                        <div class="event-item-modern-text">
                          <p>All -Over Hair Color is a single-process hair color with scalp-to-ends application, also known as a “solid color” service. Price depends on hair length.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$19.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Inoa Color</a></h4>
                        <div class="event-item-modern-text">
                          <p>The ultimate in ammonia-free color that is gentler and healthier on your scalp.  We have 22 patents for a color that is pure, vibrant and more beautiful than ever.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$11.89</p>
                        <h4 class="event-item-modern-title"><a href="#">Retouch Lightener (Includes Toner)</a></h4>
                        <div class="event-item-modern-text">
                          <p>This service is ideal for maintaining an all-over blonde look. Toner guarantees an excellent result. Price depends on hair length.</p>
                        </div>
                      </div>
                      <div class="event-item-modern">
                        <p class="event-time">$16.89</p>
                        <h4 class="event-item-modern-title"><a href="#">6 Foil Highlight with Haircut &amp; Blow-Out</a></h4>
                        <div class="event-item-modern-text">
                          <p>This is a great service for a first-time highlight. Adds some highlight in the hairline and part. Limited to a total of 6 foils. Includes haircut and styling.</p>
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
      <!-- PARTNERS-->
      
      
      <section class="parallax-container" data-parallax-img="images/parallax-img-2.jpg">
        <div class="parallax-content section-xxl text-center context-dark">
          <div class="container">
            <div class="wow-outer">
              <div class="wow slideInDown">
                <h2>Testimonials</h2>
              </div>
            </div>
            <!-- Slick Carousel-->
            <div class="slick-slider carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel" data-autoplay="true">
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>Janette cut my hair and did partial highlights and my experience was excellent! She took her time doing my hair and I am very pleased with the results. If you are still looking where to have your hair cut the best way, head for Curl !</p>
                  </div>
                  <div class="testimonials-modern-name">Kate Wilson</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>Lauren made my hair look the best it's ever looked. My mom and I were in for the weekend out of town and decided to get our hair done. I knew I wanted to try something new with my hair, and your stylist was so accommodating and a joy to be around.</p>
                  </div>
                  <div class="testimonials-modern-name">Julia Parker</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>There are hair salons, and there's Curl , a team of true hair experts. Being from NYC, I've been to many well-known salons and I've never had a better experience. Stylists here listen to you and ensure that you always leave with what you have asked for.</p>
                  </div>
                  <div class="testimonials-modern-name">Susan	Davis</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>I've been coming here for years and I can confidently say that Curl  is the best hair salon that is also very consistent with the quality of service and hair color. Besides great hairstyling experience, you can also enjoy a unique and friendly atmosphere at this salon.</p>
                  </div>
                  <div class="testimonials-modern-name">Anne	Jackson</div>
                </div>
              </div>
            </div>
            <div class="slick-slider slider-dots" id="child-carousel" data-for=".carousel-parent" data-arrows="false" data-loop="false" data-dots="false" data-swipe="true" data-items="4" data-xs-items="4" data-sm-items="4" data-md-items="4" data-lg-items="4" data-xl-items="4" data-slide-to-scroll="1">
              <div class="item">
                <div class="slick-dot-item"><img src="images/user-1-60x60.jpg" alt="" width="60" height="60"/>
                </div>
              </div>
              <div class="item">
                <div class="slick-dot-item"><img src="images/user-2-60x60.jpg" alt="" width="60" height="60"/>
                </div>
              </div>
              <div class="item">
                <div class="slick-dot-item"><img src="images/user-3-60x60.jpg" alt="" width="60" height="60"/>
                </div>
              </div>
              <div class="item">
                <div class="slick-dot-item"><img src="images/user-4-60x60.jpg" alt="" width="60" height="60"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="section section-lg bg-gray-1" id="contacts">
        <div class="container">
          <div class="row justify-content-left justify-content-lg-between row-2-columns-bordered row-50">
            <div class="col-md-10 col-lg-4">
              <h2 class="text-center text-sm-start">CONTACTS</h2>
              <div class="row-md-6 row-lg-4">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-triangle decorate-color-primary-light"><span class="icon-xl linearicons-phone-incoming icon-gray-800"></span></div>
                  <div class="box-icon-caption">
                    <h4><a href="#">1-800-123-1234</a></h4>
                    <p>You can call us anytime</p>
                  </div>
                </div>
              </div>
              <div class="row-md-6 row-lg-4">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-circle decorate-color-primary-light"><span class="icon-xl linearicons-map2 icon-gray-800"></span></div>
                  <div class="box-icon-caption">
                    <h4><a href="#">51 Francis Street, Darlinghurst NSW 2010, United States</a></h4>
                  </div>
                </div>
              </div>
              <div class="row-md-6 row-lg-4">
                <div class="box-icon-modern">
                  <div class="box-icon-inner decorate-rectangle decorate-color-primary-light"><span class="icon-xl linearicons-paper-plane icon-gray-800"></span></div>
                  <div class="box-icon-caption">
                    <h4><a href="#">info@demolink.org</a></h4>
                    <p>Feel free to email us your questions</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-10 col-lg-7">
              <h2 class="text-center text-sm-start">GET IN TOUCH</h2>
              <!-- RD Mailform-->
              <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                <div class="form-wrap rd-form-2-2">
                  <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                  <label class="form-label" for="contact-name">Name</label>
                </div>
                <div class="form-wrap rd-form-2-2">
                  <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                  <label class="form-label" for="contact-email">Email</label>
                </div>
                <div class="form-wrap rd-form-2-2">
                  <label class="form-label" for="contact-message"> Message</label>
                  <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                </div>
                <div class="row justify-content-left">
                  <div class="col-12 col-sm-7 col-lg-5">
                    <button class="button button-third" type="submit">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      <footer class="section footer-minimal context-dark">
        <div class="container wow-outer">
          <div class="wow fadeIn">
            <div class="row row-50">
              <div class="col-12">
                <!-- Brand<a class="brand" href="index.html"><img class="brand-logo-dark" src="images/logo-default-250x111.png" alt="" width="250" height="111"/><img class="brand-logo-light" src="images/logo-inverse-250x111.png" alt="" width="250" height="111"/></a> -->
                <a class="nuevo-brand-2" href="index.php">Sofía Nadal Estilistas</a>
              </div>
              <div class="col-12">
                <ul class="footer-minimal-nav">
                  <li><a href="#">Pricing</a></li>
                  <li><a href="#contacts">Contacts</a></li>
                  <li><a href="#gallery">Gallery</a></li>
                  <li><a href="#">About</a></li>
                </ul>
              </div>
              <div class="col-12">
                <ul class="social-list">
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="#"></a></li>
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram" href="#"></a></li>
                  <li><a class="icon icon-sm icon-circle icon-circle-md icon-bg-white fa-pinterest-p" href="#"></a></li>
                </ul>
              </div>
            </div>
            <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>Sofía Nadal Estilistas</span><span>.&nbsp;</span><span>Todos los derechos reservados.</span><span>&nbsp;</span></p>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js">
      <!-- coded by dyoma-->
    </script>
  </body>
</html>