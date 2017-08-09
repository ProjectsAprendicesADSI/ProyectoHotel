<!DOCTYPE HTML>
<html>
<head>
    <title>Fast Food a Food and restaurant Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
    <link href="assets/fastfood-web/web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/fastfood-web/web/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Fastfood Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,700,800' rel='stylesheet' type='text/css'><link href='http://fonts.googleapis.com/css?family=Sigmar+One' rel='stylesheet' type='text/css'>
    <script src="assets/fastfood-web/web/js/jquery-1.8.3.min.js"></script>
    <script src="assets/fastfood-web/web/js/scripts.js" type="text/javascript"></script>
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="assets/fastfood-web/web/js/move-top.js"></script>
    <script type="text/javascript" src="assets/fastfood-web/web/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <!---End-smoth-scrolling---->
    <!------ Light Box ------>
    <link rel="stylesheet" href="assets/fastfood-web/web/css/swipebox.css">
    <script src="assets/fastfood-web/web/js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $(".swipebox").swipebox();
        });
    </script>
    <!------ Eng Light Box ------>
    <script src="assets/fastfood-web/web/js/responsiveslides.min.js"></script>
    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="assets/fastfood-web/web/css/style4.css" />
    <script type="text/javascript">
        // Don't use this code on your site
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-7243260-2']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <!--Animation-->
    <script src="assets/fastfood-web/web/js/wow.min.js"></script>
    <link href="assets/fastfood-web/web/css/animate.css" rel='stylesheet' type='text/css' />
    <script>
        new WOW().init();
    </script>
    <!---/End-Animation---->

</head>
<body>

<?php include 'header.php';?>

<body class="header-banner" id="head">
    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
                <li>
                    <img src="assets/fastfood-web/web/images/hobo.jpg" alt="">
                    <div class="caption wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                        <div class="logo">
                            <h3>bienvenido</h3>
                        </div>
                        <h3>al hotel</h3>
                    </div>
                </li>
                <li>
                    <img src="assets/fastfood-web/web/images/hotel.jpg" alt="">
                    <div class="caption wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                        <div class="logo">
                            <h3>bienvenido</h3>
                        </div>
                        <h3>al hotel</h3>
                    </div>
                <li>
                    <img src="assets/fastfood-web/web/images/banner1.jpg" alt="">
                    <div class="caption wow bounceIn animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                        <div class="logo">
                            <h3>bienvenido</h3>
                        </div>
                        <h3>al hotel</h3>
                    </div>
                </li>
                <li>
                    <img src="assets/fastfood-web/web/images/4.jpg" alt="">
                    <div class="caption wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                        <div class="logo">
                            <h3>bienvenido</h3>
                        </div>
                        <h3>al hotel</h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <!-- services -->
    <div class="spacer services wowload fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <!-- RoomCarousel -->
                    <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active"><img src="images/photos/8.jpg" class="img-responsive" alt="slide"></div>
                            <div class="item  height-full"><img src="images/photos/9.jpg"  class="img-responsive" alt="slide"></div>
                            <div class="item  height-full"><img src="images/photos/10.jpg"  class="img-responsive" alt="slide"></div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- RoomCarousel-->
                    <div class="caption">Habitaciones<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
                </div>


                <div class="col-sm-4">
                    <!-- RoomCarousel -->
                    <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active"><img src="images/photos/6.jpg" class="img-responsive" alt="slide"></div>
                            <div class="item  height-full"><img src="images/photos/3.jpg"  class="img-responsive" alt="slide"></div>
                            <div class="item  height-full"><img src="images/photos/4.jpg"  class="img-responsive" alt="slide"></div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- RoomCarousel-->
                    <div class="caption">Playa<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
                </div>


                <div class="col-sm-4">
                    <!-- RoomCarousel -->
                    <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active"><img src="images/photos/1.jpg" class="img-responsive" alt="slide"></div>
                            <div class="item  height-full"><img src="images/photos/2.jpg"  class="img-responsive" alt="slide"></div>
                            <div class="item  height-full"><img src="images/photos/5.jpg"  class="img-responsive" alt="slide"></div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                        <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- RoomCarousel-->
                    <div class="caption">Comidas y Bebidas<a href="gallery.php"><i class="fa fa-edit"></i></a></div>
                </div>
            </div>
        </div>
    </div>

    <footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="icon">
                        <img src="images/photos/logo.png" class="img-responsive" alt="" />
                    </div>
                    <h4>Quick Links</h4>
                    <h3>Reservaciones</h3>
                    <h4>(043)423145</h4>
                </div>
                <div class="col-sm-6">
                    <h4>Ubiquemos en la Kra Nª687 Hotel Tequendama - Bogota</h4>
                    <h3>Celular: 943059938/ 988669103 </h3>
                    <h4>E-smail: info@hoteltequen.com</h4>
                </div>


            </div>
            <!--/.row-->
        </div>
        <!--/.container-->

        <!--/.footer-bottom-->
    </footer>


</body>