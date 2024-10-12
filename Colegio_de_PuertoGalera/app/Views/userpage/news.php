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
    <!--color css-->
    <link rel="stylesheet" id="triggerColor" href="assets/css/triggerplate/color-0.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<style>
   .news-row {
        margin-bottom: 30px; /* Add margin bottom to create space between rows */
    }
</style>

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
        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom-inner">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-sm-9">
                            <div class="logo">
                                <a href="/"><img src="assets/images/icon/colegiologo.png" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 d-none d-lg-block">
                            <div class="main-menu">
                                <nav>
                                    <ul id="m_menu_active">
                                        <li><a href="/">Home</a>
                                        
                                        </li>
                                        <li><a href="/aboutus">About</a></li>
                                        <li ><a href="javascript:void(0);">Courses</a>
                                            <ul class="submenu">
                                                <li ><a href="/courses">courses</a></li>
                                                <li><a href="course-details.html">course details</a></li>
                                                <li><a href="/admission">Admission</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);">teacher</a>
                                            <ul class="submenu">
                                                <li><a href="/teachers">Teachers</a></li>
                                                <li><a href="teacher-details.html">Teacher details</a></li>
                                                
                                            </ul>
                                        </li>
                                        
                                        </li>
                                        <li><a href="javascript:void(0);">Events</a>
                                            <ul class="submenu">
                                                <li><a href="/events">Events List</a></li>
                                                <li><a href="blog-details.html">Event details</a></li>
                                            </ul>
                                        </li>
                                        <li class="active"><a href="javascript:void(0);">News</a>
                                            <ul class="submenu">
                                                <li class="active"><a href="/news">News</a></li>
                                                <li><a href="blog-details.html">News details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-2 col-sm-3">
                            <div class="hb-right">
                                <ul> 
                                    <li class="search_btn"><i class="fa fa-search"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <div id="mobile_menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <h4 class="crumb-title"><span>News</span> & Updates</h4>
            </div>
        </div>
    </div>
    <!-- crumbs area end -->


<!-- blog area start -->
<div class="blog-area pt--120 pb--70">
    <div class="container">
        <?php $index = 0; ?>
        <?php foreach ($news as $article) : ?>
            <?php if ($index % 3 == 0) : ?>
                <div class="row news-row"> <!-- Add a new class to each row of news items -->
            <?php endif; ?>
            <div class="col-lg-4 col-md-6">
                <div class="card mb-5" style="height: 100%;">
                    <img class="card-img-top" src="<?= base_url('uploads/' . $article['image_url']) ?>" alt="image" style="height: 250px; object-fit: cover;">
                    <div class="card-body p-25">
                        <ul class="list-inline blog-meta mb-3">
                            <li><i class="fa fa-clock-o"></i> <?= date('F j, Y', strtotime($article['date_published'])) ?></li>
                            <li><i class="fa fa-user"></i> <?= esc($article['author']) ?></li>
                        </ul>
                        <h4 class="card-title mb-4"><a href="blog-details.html"><?= esc($article['title']) ?></a></h4>
                        <p class="card-text"><?= esc($article['content']) ?></p>
                        <a class="btn btn-primary btn-round btn-sm" href="#"> Read More </a>
                    </div>
                </div><!-- card -->
            </div>
            <?php $index++; ?>
            <?php if ($index % 3 == 0 || $index == count($news)) : ?>
                </div> <!-- Close the row after every 3 news items or at the end of the loop -->
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<!-- blog area end -->




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
</body>

</html>