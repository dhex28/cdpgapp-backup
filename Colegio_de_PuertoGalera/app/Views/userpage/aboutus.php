<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Colegio De Puerto Galera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/colegiologo.png">
    <!-- all css here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wCz5sflITx2au2+SS+OgPbifvzI/q0fMxzCGVoN6NsdEhQ9x5PVnIC1tgsz7O1f6PCiDjUr14GV2N8Z9BZZGyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--color css-->
    <link rel="stylesheet" id="triggerColor" href="assets/css/triggerplate/color-0.css">
    <!-- modernizr css -->


    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
   .teacher-image {
    height: 300px; /* Set a fixed height for all teacher images */
    object-fit: cover; /* Maintain aspect ratio and cover container */
}

.teacher-content {
    height: 400px; /* Set a fixed height for the card-body */
    overflow: hidden; /* Hide overflow content */
}

.overflow-auto {
    overflow: auto; /* Enable scrolling for long descriptions */
}

.teacher-carousel .item {
        margin-right: 40px; /* Adjust this value to increase/decrease space between cards */
    }

    .teacher-carousel .card {
        width: 100%; /* Make the cards the same width */
    }
    .custom-img {
        width: 100%; /* Set the width to 100% */
        height: 350px; /* Let the height adjust proportionally */
    }
</style>


</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- prealoader area end -->
    <!-- header area start -->
    <header id="header">
        <!-- header top area start -->
        <!-- <div class="header-top">
            <div class="container">
                <div class="row d-flex flex-center">
                    <div class="col-sm-8">
                        <div class="ht-address">
                            <ul>
                                <li><i class="fa fa-phone"></i>+ 88 01916 444137</li>
                                <li><i class="fa fa-envelope"></i>info@example.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="ht-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- header top area end -->


        <!-- header bottom area start -->
        <?= $this->include('include/header2') ?>
        <!-- header bottom area end -->
    </header>
    <!-- header area end -->
    <!-- offset search area start -->
    <div class="offset-search"> 
        <form action="#">
            <input type="text" name="search" placeholder="Sarch here...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- offset search area end -->
    <!-- body overlay area start -->
    <div class="body_overlay"></div>
    <!-- body overlay area end -->
    <!-- crumbs area start -->
    <div class="crumbs-area">
        <div class="container">
            <div class="crumb-content">
                <h4 class="crumb-title"><span>About </span>Us</h4>
            </div>
        </div>
    </div>
    <!-- crumbs area end --> 
    <!-- about area start -->
    <div class="about-area ptb--120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-left-content">
                        <div class="section-title">
                            <span class="text-uppercase">about us</span>
                            <h2>Welcome to</h2><h2><span class="primary-color">Colegio De Puerto Galera</span></h2> 
                        </div>
                        <p>Colegio De Puerto Galera is a leading educational institution in Puerto Galera, Philippines, renowned for its commitment to academic excellence and holistic development. Our institution prides itself on providing quality education that nurtures the minds and spirits of our students, preparing them for success in a rapidly changing world. With a dedicated faculty and staff, diverse academic programs, and a strong emphasis on community engagement, Colegio De Puerto Galera offers students a dynamic learning environment where they can thrive academically, socially, and personally. Welcome to Colegio De Puerto Galera, where education transforms lives and inspires futures.</p>
                        
                        <!-- <a href="#" class="btn btn-primary btn-round">Read more</a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="abt-right-thumb">
                        <div class="abt-rt-inner">
                            <a class="expand-video" href="https://www.youtube.com/watch?v=4pRpPblXavk?autoplay=1"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- about area end -->

    <!-- take toure area start -->
    <?= $this->include('include/vmgo') ?>
    <!-- take toure area end -->

    <div class="card mb-5"> 
</div>


<!-- teacher area start -->
<div class="teacher-area befr-themeoclor pb--70">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="section-title">
                    <span class="text-uppercase">Learn from <span class="primary-color">the best</span></span>
                    <h2>Our Teachers</h2>
                </div>
            </div>
        </div>
        <div class="teacher-carousel owl-carousel">
            <?php foreach ($teachers as $teacher) { ?>
                <div class="item">
                    <div class="card mb-5">
                        <img src="<?= base_url('uploads/' . $teacher['image']) ?>" alt="Teacher Image" class="card-img-top custom-img">
                        <div class="card-body teacher-content p-25">
                            <h4 class="card-title mb-4"><a href="#"><?php echo $teacher['name']; ?></a></h4>
                            <span class="primary-color d-block mb-3"><?php echo $teacher['designation']; ?></span>
                            <p class="card-text"><?php echo $teacher['description']; ?></p>
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-deviantart"></i></a></li>
                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- card -->
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- teacher area end -->

<!-- Add navigation arrows for carousel -->
<div class="custom-nav">
    <div class="teacher-carousel-prev"><i class="fa fa-chevron-left"></i></div>
    <div class="teacher-carousel-next"><i class="fa fa-chevron-right"></i></div>
</div>

<!-- Initialize Owl Carousel -->
<script>
    $(document).ready(function() {
        $(".teacher-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            nav: true,
            navText: [
                '<i class="fa fa-chevron-left"></i>',
                '<i class="fa fa-chevron-right"></i>'
            ]
        });
    });
</script>





 
    <!-- footer area start -->
    <?= $this->include('include/footer') ?>
    <!-- footer area end -->
 
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!-- Script for VMGO Slider -->

</body>



</html>