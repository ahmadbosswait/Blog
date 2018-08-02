<?php include_once 'header.php'; ?>
    <!-- Page Content -->
    <div class="container">
    <div class="row">
    <div class="col-md-8">
        <!-- slider section -->
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
                <li>
                    <a href="#">
                        <img src="<?php echo $blogBaseUrl; ?>static/image/girl1.jpg" alt="">
                        <p class="caption">Give a girl the right shoes, and she can conquer the world.</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="<?php echo $blogBaseUrl; ?>static/image/girl2.jpg"  alt="">
                        <p class="caption">A smart girl leaves before she is left.</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="<?php echo $blogBaseUrl; ?>static/image/computer1.jpg"  alt="">
                        <p class="caption">Give a girl the right .</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="<?php echo $blogBaseUrl; ?>static/image/computer2.jpg" alt="">
                        <p class="caption">A smart girl leaves before she is left.</p>
                    </a>
                </li>
            </ul>
        </div>
        <!-- end slider section -->
        <!-- Blog Post -->
        <div class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-body panel-body-custom-postbox">
                            <img style="height: 220px" src="<?php echo $post->image_url; ?>"
                                 class="img-responsive center-block img-thumbnail" alt="">
                            <div class="caption topic-title">
                                <h1>
                                    <a href="<?php echo $blogBaseUrl; ?>show/post/<?php echo $post->id ?>"><?php echo $post->title; ?></a>
                                </h1>
                                <p><?php echo $post->abstract; ?></p>
                            </div>
                        </div>
                        <div class="panel-heading panel-heading-custom-postbox">
                            <ul class="list-inline text-center">
                                <li><i class="fa fa-user" style="margin-right: 3px"></i><a href="">alice</a></li>
                                <li><i class="fa fa-calendar-o"
                                       style="margin-right: 3px"></i><?php echo $post->post_date; ?></li>
                                <li><i class="fa fa-eye" style="margin-right: 3px"></i><?php echo $post->views ?> views
                                </li>
                                <li><i class="fa fa-comment" style="margin-right: 3px"></i><a href="">5 com</a>
                                </li>
                            </ul>
                            <div class="angle"></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php
        $url = $_SERVER['REQUEST_URI'];
        if (strpos($url, 'posts') or !strpos($url, 'cat')) {
            $url_str = 'posts';
        } else {
            $url_str = $posts[0]->cat_id;
        }
        $numPages = ceil($numPosts / $postPerPage); ?>
        <div class="clearfix"></div>
        <div class="navigation">
            <ul class="pager">
                <?php if ($page > 1) { ?>
                    <li class="previous">
                        <a href="<?php echo $blogBaseUrl; ?>show/cat/<?php echo $url_str . '/'; ?><?php echo $page - 1; ?>">&larr;
                            back </a>
                    </li>
                <?php } ?>

                <?php if ($page < $numPages) { ?>
                    <li class="next">
                        <a href="<?php echo $blogBaseUrl; ?>show/cat/<?php echo $url_str . '/'; ?><?php echo $page + 1; ?>">
                            next &rarr;</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <br>
        <?php if ($numPosts != 0) { ?>
            <div class="center"><?php echo "page $page  from $numPages"; ?></div>
        <?php } ?>
        

    </div>
<?php include_once 'sidebar.php'; ?>
<?php include_once 'footer.php'; ?>
