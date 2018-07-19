<?php include_once 'header.php'; ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <?php if (isset($msg)) echo "<div class='alert alert-".$style."'>$msg</div>"; ?></div>

        <div class="col-lg-8 col-md-8">
            <div class="post">
                <h1><?php echo $post->title; ?></h1>
                <p class="date">
                    <span>ارسال شده در <?php echo $post->post_date; ?></span>
                    <?php if(isset($isLoggedIn) and $isLoggedIn):?>
                    <span><a href="<?php echo $blogBaseUrl . 'admin/send/edit/' . $post->id; ?>">Edit</a></span>
                    <?php endif; ?>

                </p>
                <hr>
                <p class="postText"><?php echo $post->body; ?></p>
                <p class="ltr">تگها : <?php echo $post->tags; ?></p>
                <hr>
            </div>

            <!-- Comments Form -->
            <div class="well">
                <h4>Comment:</h4>

                <form role="form" method="post">
                    <div class="form-group center">
                        <input class="form-control w30p" type="text" name="name" placeholder="Your name"/>
                        <input class="form-control w30p ltr" type="text" name="email" placeholder="Your Email"/>
                        <input class="form-control w30p ltr" type="text" name="website" placeholder="Your Site"/>
                        <textarea class="form-control" name="comment" rows="3"></textarea>
                    </div>
                    <input type="submit" name="submitComment" class="btn btn-primary" value="  Send  ">
                </form>
            </div>

            <!-- Posted Comments -->
            <?php if($comments): ?>
                <h3>Comments :</h3>
                <hr>
            <?php foreach ($comments as $comment): ?>
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $comment->author ?>
                        &nbsp; &nbsp;  <small><?php echo $comment->comment_date ?></small>
                    </h4>
                    <p><?php echo $comment->body ?></p>
                </div>
                    <?php if ($likeEnable): ?>
                <div class="vote pull-right">
                    <span class="cRate rateDown" id="<?php echo $comment->id ?>-down">-</span>
                    <span class="rateVal" id="<?php echo $comment->id ?>-rate"><?php echo $comment->rate ?></span>
                    <span class="cRate rateUp" id="<?php echo $comment->id ?>-up">+</span>
                </div>
                    <?php endif; ?>
            </div>
            <hr>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
    <?php if ($likeEnable): ?>
        <script>
            $(document).ready(function () {
                $(".cRate").click(function (e) {
                    var thisElement = $(this);
                    var reqURL = "<?php echo $blogBaseUrl; ?>ajax/cLike";
                    thisElement.parent().find('.rateVal').fadeIn(10).html('...');
                    $.ajax({
                        type: 'POST',
                        url: reqURL,
                        data: {cRateStr: thisElement.attr('id')},
                        success: function (response) {
                            thisElement.parent().find('.rateVal').html(response);
                            thisElement.parent().find('.rateVal').fadeIn(500);
                        },
                        error: function (xhr, status, error) {
                            thisElement.parent().find('.rateVal').html('error');
                            thisElement.parent().find('.rateVal').fadeIn(500);
                        }
                    });
                });
            });
        </script>
    <?php endif; ?>

        <?php include_once 'sidebar.php'; ?>
        <?php include_once 'footer.php'; ?>
