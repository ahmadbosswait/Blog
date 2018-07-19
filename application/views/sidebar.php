<!-- Blog Sidebar Widgets -->
<div class="col-lg-4  col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading panel-heading-news-letter">
            <a href="#news-letter" data-toggle="collapse"><p>Search</p></a>
        </div>
        <div class="collapse in" id="news-letter">
            <div class="panel-body panel-body-news-letter">
                <h3>Write your keyword here:</h3>
                <form action="<?php echo $blogBaseUrl; ?>show/search/" method="get">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input class="input-group form-control" name="s" placeholder="Search" type="text">
                        <div class="input-group-btn">
                            <button type="submit" value="Search" class="btn btn-warning">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="footer-news-letter text-center">

            </div>
        </div>
    </div>

    <div class="well">
        <h3>Categories</h3>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li><a href="<?php echo $blogBaseUrl; ?>show/cat/posts/"> All</a></li>
                    <?php foreach ($cats as $cat): ?>
                        <li>
                            <a href="<?php echo $blogBaseUrl; ?>show/cat/<?php echo $cat->id; ?>"><?php echo $cat->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <?php foreach ($widgets as $wg): ?>
        <div class="well">
            <h3><?php echo $wg->title ?></h3>
            <p><?php echo $wg->body ?></p>
        </div>
    <?php endforeach; ?>
</div>
</div>
<hr>