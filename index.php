<?php
session_start();
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>SNEstilistas</title>
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

                      if (($_SESSION["rol"] == "usuario")) {
                    ?>
                        
                        <ul class="rd-navbar-nav">
                          <li class="rd-nav-item"><a class="rd-nav-link" href="micuenta.php">Mi Cuenta</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Mis Reservas</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a>
                          </li>
                        </ul>
                    <?php
                      } else if(($_SESSION["rol"] == "administrador")) {
                    
                    ?>
                        <ul class="rd-navbar-nav">
                          <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administración</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Reservas</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="menuservicios.php">Servicios</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a>
                          </li>
                        </ul>
                      


                    <?php
                      } else {
                    ?>
                        <ul class="rd-navbar-nav">
                          <li class="rd-nav-item"><a class="rd-nav-link" href="administracion.php">Administración</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="misreservas.php">Reservas</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="menuservicios.php">Servicios</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="salir.php">Salir</a>
                          </li>
                        </ul>
                    <?php

                      }

                    } else {
                        // Si no está autenticado, incluye el formulario de inicio de sesión
                    ?>
                        <ul class="rd-navbar-nav">
                          <li class="rd-nav-item"><a class="rd-nav-link" href="reservarCita.php">Reservar Cita</a>
                          </li>
                          <li class="rd-nav-item"><a class="rd-nav-link" href="registro.php">Registrarse</a>
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
                  <a href="reservarCita.php"><button class="button button-secondary" type="submit">Reservar</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section class="section section-lg bg-default">
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-md-9 col-lg-7 wow-outer">
              <div class="wow slideInDown">
                <h2>Servicios Destacados</h2>
                <p>Ofrecemos una gama completa de servicios para el cabello que incluyen cortes y peinados,<br class="d-none d-lg-block"> coloración, alisado del cabello y mucho más..</p>
              </div>
            </div>
          </div>
          <div class="row row-40">
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="team-minimal">
                  <div class="team-minimal-figure"><img src="images/team-minimal-1-370x395.jpg" alt="" width="370" height="395"/>
                    <ul class="team-minimal-soc-list">
                      <li><a class="button button-sm button-secondary" href="#">Reservar</a></li>
                    </ul>
                  </div>
                  <div class="team-minimal-caption">
                    <h4 class="text-uppercase"><a class="team-name" href="#">Cortes de pelo</a></h4>
                    <h6 class="text-primary text-uppercase">Creando tu imagen </h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="team-minimal">
                  <div class="team-minimal-figure"><img src="images/team-minimal-2-370x395.jpg" alt="" width="370" height="395"/>
                    <ul class="team-minimal-soc-list">
                      <li><a class="button button-sm button-secondary" href="#">Reservar</a></li>
                    </ul>
                  </div>
                  <div class="team-minimal-caption">
                    <h4 class="text-uppercase"><a class="team-name" href="#">Peinados</a></h4>
                    <h6 class="text-primary text-uppercase">Consigue tu mejor look</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 wow-outer">
              <div class="wow fadeInUp">
                <div class="team-minimal">
                  <div class="team-minimal-figure"><img src="images/team-minimal-3-370x395.jpg" alt="" width="370" height="395"/>
                    <ul class="team-minimal-soc-list">
                      <li><a class="button button-sm button-secondary" href="#">Reservar</a></li>
                    </ul>
                  </div>
                  <div class="team-minimal-caption">
                    <h4 class="text-uppercase"><a class="team-name" href="#">Coloración</a></h4>
                    <h6 class="text-primary text-uppercase">Cualquier color que puedas imaginar</h6>
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
            <h2>Nuestros Trabajos</h2>
            <div class="small-text">Consulte nuestros trabajos que incluyen cortes de cabello, extensiones de cabello y<br class="d-none d-lg-block"> más. Todo lo que ves aquí fue realizado por nuestros estilistas y peluqueros.</div>
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
                <h2>Sobre Nosotros</h2>
                <p class="p1">Sofía Nadal Estilistas es uno de los salones de belleza más importantes de la provincia de Alicante, frecuentado no solo por mujeres sino también por hombres y niños.</p>
                <p>Con una experiencia de más de 20 años, nuestro salón de belleza se ha ganado una reputación increíble ya que nuestro equipo profesional de estilistas continúa haciendo maravillas en el cabello de los clientes.</p>
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
                <h2>Experiencias</h2>
              </div>
            </div>
            <!-- Slick Carousel-->
            <div class="slick-slider carousel-parent" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="1" data-child="#child-carousel" data-for="#child-carousel" data-autoplay="true">
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>¡Mi experiencia fue increíble! Me cortaron el pelo y me hicieron mechas parciales tomando el tiempo necesario para peinarme. Sin duda estoy muy satisfecha con el resultado obtenido. </p>
                  </div>
                  <div class="testimonials-modern-name">Laura</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>¡Mi pelo luce mejor que nunca! Quería probar algo nuevo y sin duda en Sofía Nadal acertaron de lleno. He quedado muy encantada con el resultado. Tengo claro que volveré! </p>
                  </div>
                  <div class="testimonials-modern-name">Julia</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>Después de acudir a varios salones, puedo decir que he tenido la mejor experiencia. Los estilistas aquí te escuchan y se aseguran de que siempre salgas con lo que has pedido.</p>
                  </div>
                  <div class="testimonials-modern-name">Susana</div>
                </div>
              </div>
              <div class="item">
                <div class="testimonials-modern">
                  <div class="testimonials-modern-text">
                    <p>Llevo años viniendo aquí y puedo decir con confianza que Sofía Nadal es la mejor peluquería y que además es muy consistente con la calidad del servicio y el color del cabello.</p>
                  </div>
                  <div class="testimonials-modern-name">Ana</div>
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
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="reservarCita.php">Reservar Cita</a></li>
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
        
        </script>
    </body>
    </html>