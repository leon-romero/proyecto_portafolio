<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>Create CV Resume - Responsive HTML5 Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/intro/css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="/intro/css/pogo-slider.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/intro/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/intro/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/intro/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="/intro/images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="/intro/index.html"><img src="/intro/images/logo.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        {{-- <li><a class="nav-link active" href="index.html">Home</a></li> --}}
                        <li><a class="nav-link active" href="{{ route('login.cliente') }}">Cliente</a></li>
                        <li><a class="nav-link active" href="{{ route('login.proveedor') }}">Proveedor</a></li>
                        <li><a class="nav-link active" href="{{ route('login.odontologo') }}">Odontologo</a></li>
                        <li><a class="nav-link active" style="background:#fff;color:#000;" href="{{ route('login.empleado') }}">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Start Banner -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide" style="background-image:url(/intro/images/slider-01.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3><span class="theme_color">EASILY</span> CREATE ONLINE</h3>
                                        <br>
                                        <h4>CV AND PROFESSIONAL<br>RESUME IN MINUTES</h4>
                                        <br>
                                        <p>Showcase your Profile to the world
                                            <br>using online CV builder and Get Hired Faster</p>
                                        <a class="contact_bt" href="#">Contact us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" style="background-image:url(/intro/images/slider-01.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3><span class="theme_color">EASILY</span> CREATE ONLINE</h3>
                                        <br>
                                        <h4>CV AND PROFESSIONAL<br>RESUME IN MINUTES</h4>
                                        <br>
                                        <p>Showcase your Profile to the world
                                            <br>using online CV builder and Get Hired Faster</p>
                                        <a class="contact_bt" href="#">Contact us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .pogoSlider -->
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full center">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color">WE CAN</span> HELP YOUR CAREER GROW</h2>
                            <p class="large">Get your CV Resume in 4 easy steps</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->
    <div class="section layout_padding theme_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                    <div class="full">
                        <img class="img-responsive" src="/intro/images/resume_img.png" alt="#" />
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 white_fonts">
                    <h3 class="small_heading">EVERYTHING YOU NEED IN ONE SOLUTION</h3>
                    <p>HELP YOUR NEXT CAREER MOVE MORE SMOOTHER AND MORE EFFICIENT</p>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</p>
                    <a href="#" class="hvr-radial-out button-theme">Get Started ></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- section -->
    <div class="section layout_padding">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="full center margin-bottom_30">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color">CHOOSE A</span> PROFESSIONAL DESIGN</h2>
                            <p class="large">Resume</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="/intro/images/img1.png" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="/intro/images/img2.png" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="/intro/images/img3.png" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="/intro/images/img4.png" alt="#" />
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="/intro/images/img1.png" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="/intro/images/img2.png" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="/intro/images/img3.png" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="/intro/images/img4.png" alt="#" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>

                <div class="col-lg-12">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their</p>
                </div>

                <div class="col-lg-12">
                    <div class="full center">
                        <a href="about.html" class="hvr-radial-out button-theme">See More ></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- end section -->

    <!-- section -->
    <div class="section layout_padding theme_bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 white_fonts">
                    <h3 class="small_heading">CREATE PERSONALISED CV </h3>
                    <p>HELP YOUR NEXT CAREER MOVE MORE SMOOTHER AND MORE EFFICIENT</p>
                    <p>ss normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in theirss normal distribution of letters, as opposed to using 'Content here, content here', making it look like../p>
                        <p><a href="about.html" class="hvr-radial-out button-theme">Read more ></a></p>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                    <div class="full">
                        <img class="img-responsive" src="/intro/images/resume_img2.png" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="full">
                        <div class="center">
                            <img src="/intro/images/icon1.png" alt="#" />
                        </div>
                        <div class="center">
                            <h4>Responsive CV Templates</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="full">
                        <div class="center">
                            <img src="/intro/images/icon2.png" alt="#" />
                        </div>
                        <div class="center">
                            <h4>Designed for Professionals</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="full">
                        <div class="center">
                            <img src="/intro/images/icon3.png" alt="#" />
                        </div>
                        <div class="center">
                            <h4>Faster. interview calls</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 offset-lg-1 margin-top_30">
                    <div class="full text_align_center">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the scrambled it to make a type specimen book. It has survived not only fiv</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- Start Footer -->
    <footer class="footer-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo">
                        <a href="index.html"><img src="/intro/images/footer_logo.png" alt="#" /></a>
                    </div>
                </div>
                <div class="col-lg-12 white_fonts">
                    <h4 class="text-align">Contact Us</h4>
                </div>
                <div class="margin-top_30 col-md-8 offset-md-2 white_fonts">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="/intro/images/social1.png">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>London 145
                                    <br>United Kingdom</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="/intro/images/social2.png">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>consultation@gmail.com
                                    <br>consultation@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="/intro/images/social3.png">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>+7586656566
                                    <br>+7586656566</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row white_fonts margin-top_30">
                <div class="col-lg-12">
                    <div class="full">
                        <div class="center">
                            <ul class="social_icon">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© 2019 RD resume . All Rights Reserved.</p>
                    <ul class="bottom_menu">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Find jobs</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="/intro/js/jquery.min.js"></script>
    <script src="/intro/js/popper.min.js"></script>
    <script src="/intro/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/intro/js/jquery.magnific-popup.min.js"></script>
    <script src="/intro/js/jquery.pogo-slider.min.js"></script>
    <script src="/intro/js/slider-index.js"></script>
    <script src="/intro/js/smoothscroll.js"></script>
    <script src="/intro/js/form-validator.min.js"></script>
    <script src="/intro/js/contact-form-script.js"></script>
    <script src="/intro/js/isotope.min.js"></script>
    <script src="/intro/js/images-loded.min.js"></script>
    <script src="/intro/js/custom.js"></script>
</body>

</html>