<?php
global $config;
$blogBaseUrl = $config['base_url'];
$adminBaseUrl = $blogBaseUrl . 'admin/';

function active($current_page)
{
    $url_array = explode('/', $_SERVER['REQUEST_URI']);
    $url = end($url_array);
    if ($current_page == $url) {
        return 'active'; //class name in css
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Blog !</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo $blogBaseUrl; ?>static/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $blogBaseUrl; ?>static/css/blog.css" rel="stylesheet">
    <script src="<?php echo $blogBaseUrl; ?>static/js/jquery.js"></script>
    <script src="<?php echo $blogBaseUrl; ?>static/js/bootstrap.min.js"></script>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $blogBaseUrl; ?>">My Blog !</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="<?php echo active('send');
                echo active('admin'); ?>"><a href="<?php echo $adminBaseUrl; ?>send">Send</a></li>
                <li class="<?php echo active('cats'); ?>"><a href="<?php echo $adminBaseUrl; ?>cats">Categories</a></li>
                <li class="<?php echo active('posts'); ?>"><a href="<?php echo $adminBaseUrl; ?>posts">manage Posts</a></li>
                <li class="<?php echo active('comments'); ?>"><a href="<?php echo $adminBaseUrl; ?>comments">manage Comments</a>
                </li>
                <li class="<?php echo active('widgets'); ?>"><a href="<?php echo $adminBaseUrl; ?>widgets">manage menu</a></li>
                <li class="<?php echo active('gallery'); ?>"><a href="<?php echo $adminBaseUrl; ?>gallery">Gallery</a></li>
                <li class="<?php echo active('options'); ?>"><a href="<?php echo $adminBaseUrl; ?>options">setting</a></li>
            </ul>
        </div>
    </div>
</nav>
<style>
    body{
        background-color: <?php echo $bgColor; ?>;
    }
</style>

