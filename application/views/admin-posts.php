<?php include_once 'admin-header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="post">
                <h1>Posts</h1>
            </div>
            <div class="well">
                <table class="table table-striped table-condensed table-hover">
                    <tr>
                        <td>id</td>
                        <td>Post</td>
                        <td>Publish Date</td>
                        <td>Operation</td>
                    </tr>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post->id ?></td>
                            <td><a href="<?php echo $blogBaseUrl . "show/post/$post->id" ?>"
                                   target="_blank"><?php echo $post->title ?></a></td>
                            <td><?php echo $post->post_date ?></td>
                            <td>
                                <a class="delete" onclick="return confirm('Are You Sure ?');"
                                   href="<?php echo $adminBaseUrl . 'posts/del/' . $post->id; ?>">Delete</a>&nbsp;&nbsp;
                                <a class="delete"
                                   href="<?php echo $adminBaseUrl . 'send/edit/' . $post->id; ?>">Edit </a> &nbsp;
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <?php
            $url = $_SERVER['REQUEST_URI'];
            if (strpos($url, 'posts')) {
                $url_str = 'posts';
            }
            $numPages = ceil($numPosts / $postPerPage); ?>
            <div class="clearfix"></div>
            <div class="navigation">
                <ul class="pager">
                    <?php if ($page > 1) { ?>
                        <li class="previous">
                            <a href="<?php echo $adminBaseUrl; ?>posts/previous/<?php echo $url_str . '/'; ?><?php echo $page - 1; ?>">&larr;
                                back </a>
                        </li>
                    <?php } ?>
                    <?php if ($page < $numPages) { ?>
                        <li class="next">
                            <a href="<?php echo $adminBaseUrl; ?>posts/next/<?php echo $url_str . '/'; ?><?php echo $page + 1; ?>">
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
        <?php include_once 'footer.php'; ?>
