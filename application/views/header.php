<?php
global $config;
$blogBaseUrl = $config['base_url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <link href="<?php echo $blogBaseUrl; ?>static/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $blogBaseUrl; ?>static/css/custom.css" rel="stylesheet">
    <link href="<?php echo $blogBaseUrl; ?>static/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $blogBaseUrl; ?>static/css/bootstrap-theme.css">
    <link rel="stylesheet" href="<?php echo $blogBaseUrl; ?>static/css/animate.css">
    <link rel="stylesheet" href="<?php echo $blogBaseUrl; ?>static/css/jasny-bootstrap.css">
    <link rel="stylesheet" href="<?php echo $blogBaseUrl; ?>static/css/responsiveslides.css">
    <link rel="stylesheet" href="<?php echo $blogBaseUrl; ?>static/css/hover.css">
    <link rel="stylesheet" href="<?php echo $blogBaseUrl; ?>static/css/bootstrap-dropdownhover.css">

</head>

<body>
<!--scroll to top btn-->
<i class="fa fa-chevron-circle-up btn btn-info scroll-to-top" style="display: none"></i>
<!-- Navigation -->
<!--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php /*echo $blogBaseUrl; */?>">Blog</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php /*echo $blogBaseUrl; */?>show/gallery">Gallery</a></li>
                <li><a href="<?php /*echo $blogBaseUrl; */?>show/contactus">Contact us</a></li>
                <?php /*if(isset($isLoggedIn) and $isLoggedIn):*/?>
                <li><a class="cyellow" href="<?php /*echo $blogBaseUrl; */?>admin">Management</a></li>
                <li><a class="cred" href="<?php /*echo $blogBaseUrl; */?>auth/logout">Log-out</a></li>
                <?php /*endif; */?>
            </ul>
        </div>
    </div>
</nav>-->
<!-- off canvas menu -->
<nav class="navmenu navmenu-custom navmenu-fixed-right offcanvas" id="mycanvas">
    <a class="navmenu-brand" href="#" >7tick</a>
    <ul class="nav navmenu-nav">
        <li class="active"><a href="#">Log in</a></li>
        <li><a href="#">Register</a></li>
        <li><a href="#">Admin management</a></li>
        <li><a href="#">Comments<span class="badge badge-offcanvas"> 77</span></a></li>
        <li><a href="#">Send Post</a></li>
    </ul>
    <ul class="nav navmenu-nav" data-hover="dropdown" data-animations="zoomIn fadeInRight zoomIn fadeInLeft">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add<span class="caret"></span></a>
            <ul class="dropdown-menu navmenu-nav submenu-offcanvas">
                <li><a href="#">New Post</a> </li>
                <li><a href="#">New Code</a> </li>
                <li><a href="#">New Tools</a> </li>
                <li class="divider" style="height: 1.5px"></li>
                <li><a href="#">New Page</a> </li>
                <li><a href="#">New User</a> </li>
            </ul>
        </li>
    </ul>
    <li><button class="btn btn-danger btn-block">Log Out</button></li>
</nav>
<!-- end off canvas menu -->
<!-- modal register -->
<div class="modal fade" id="register-modal">
    <div class="modal-dialog">
        <!-- modal content -->
        <div class="modal-content">
            <div class="modal-header btn-primary modal-header-custom">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>

            <div class="modal-body">
                <form>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control" placeholder="Your Name" type="text" name="" id="">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input class="form-control" placeholder="Your pass" type="password" name="" id="">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input class="form-control" placeholder="E-mail" type="email" name="" id="">
                    </div>
                    <button type="button" class="btn btn-success center-block">Register</button>
                </form>
                <br>
                <div class="alert alert-info text-center">Signing up at fast as fast</div>

            </div>
        </div>
    </div>
</div>
<!-- end modal register-->
<!-- modal search -->
<div class="modal fade" id="search-modal">
    <div class="modal-dialog modal-sm">
        <!-- modal content -->
        <div class="modal-content">
            <div class="modal-header btn-warning modal-header-custom">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Search</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input class="form-control" placeholder="Type your words" type="text" name="" id="">
                        <div class="input-group-btn"><button class="btn btn-info">Search</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal search -->

<!-- Header-->
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 cl-effect-2"  id="cl-effect-2">
                <ul class="list-inline header-menu-link">
                    <li><a href="#" data-toggle="modal" data-target="#register-modal"><span data-hover="Register">Register</span></a></li>
                    <li><a href="#"><span data-hover="Ads">Ads</span></a></li>
                    <li><a href="#"><span data-hover="About Us">About Us</span></a></li>
                    <li><a href="#"><span data-hover="Contact Us">Contact Us</span></a></li>
                    <li><a href="#"><span data-hover="Forum">Forum</span></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 logo-title text-left">
                <a href="#"><img class="header-logo img-circle pull-left" src="<?php echo $blogBaseUrl; ?>static/image/7learn.png" alt=""></a>
                <h1>7tick</h1>
                <h3>The Centre of The Web Development</h3>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- main menu -->
<nav class="navbar navbar-custom">
    <div class="container-fluid main-menu-container" data-spy="affix" data-offset-top="200">
        <div class="navbar-header  pull-left">
            <button type="button" class="navbar-toggle navbar-toggle-custom" data-toggle="collapse" data-target="#menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"><img src="<?php echo $blogBaseUrl; ?>static/image/home.png" alt=""></a>
        </div>

        <div class="navbar-header dropdown pull-right">
            <a class="hvr-underline-from-center pull-right" href="#" data-toggle="offcanvas" data-target="#mycanvas" data-canvas="body">
                <i class="fa fa-bars navbar-toggle icon-bars"></i>
            </a>
            <a class="hvr-underline-from-center pull-left" href="#" data-toggle="modal" data-target="#search-modal">
                <i class="fa fa-search navbar-toggle icon-search"></i>
            </a>
            <a class="hvr-underline-from-center" href="#" data-toggle="dropdown">
                <i class="fa fa-sign-in navbar-toggle icon-sign-in"></i>
            </a>
            <ul class="dropdown-menu panel panel-primary panel-custom" style="margin-top: 20px">
                <div class="panel-heading panel-heading-custom-login">
                    <button class="close" data-dismiss="panel">&times;</button>
                    <p>Log-in</p>
                    <div class="angle-sign-in"></div>
                </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                            <input type="text" class="form-control" placeholder="User-name">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox">Remember me</label>
                            </div>
                        </div>
                        <button class="btn btn-success pull-right">Log in</button>
                    </form>
                </div>
            </ul>

        </div>
        <div class="clearfix hidden-md hidden-lg hidden-sm"></div>

        <div class="collapse navbar-collapse" id="menu" data-hover="dropdown" data-animations="zoomIn fadeInRight zoomIn fadeInLeft">
            <ul class="nav navbar-nav navbar-nav-custom">
                <li><a class="hvr-bounce-to-top" href="<?php echo $blogBaseUrl; ?>">Blog</a></li>
                <li><a class="hvr-bounce-to-top" href="<?php echo $blogBaseUrl; ?>show/gallery">Gallery</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">develop <span class="caret"></span></a>
                    <ul class="dropdown-menu sub-menu">
                        <li><a href="#">Bespoke Web Development Services</a></li>
                        <li><a href="#">Content Management</a></li>
                        <li><a href="#">Search Optimization</a></li>
                        <li><a href="#">Database Systems</a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Website Design<i class="fa fa-caret-right" style="padding-left: 150px"></i></a>
                            <ul class="dropdown-menu sub-menu">
                                <li><a href="#">Mobile Web Apps</a></li>
                                <li><a href="#">Web Development</a></li>
                                <li><a href="#">Our Services & Solutions</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="hvr-bounce-to-top" href="<?php echo $blogBaseUrl; ?>show/contactus">Contact US</a></li>
                <?php if(isset($isLoggedIn) and $isLoggedIn):?>
                <li><a class="hvr-bounce-to-top" href="<?php echo $blogBaseUrl; ?>admin">Management</a></li>
                <li><a class="hvr-bounce-to-top" href="<?php echo $blogBaseUrl; ?>auth/logout">Log-out</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- end main menu -->
