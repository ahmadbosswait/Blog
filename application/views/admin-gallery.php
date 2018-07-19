<?php include_once 'admin-header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php if (isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
        </div>
        <form class="well" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Write a name for title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" id="">
                <label for="file">Select a file to upload</label>
                <input name="image" type="file">
                <p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p>
            </div>
            <input class="btn btn-lg btn-primary" name="submit" value="Upload" type="submit">
        </form>
    </div>
</div>
</div>

<div class="container" id="img-thum">
    <div class="row">
        <?php foreach ($images as $image): ?>
        <div class="col-md-2">
            <div class="thumbnail">
                <img class="img-gallery" src="<?php echo $image->image_url; ?>" alt="...">
                <div class="caption">
                    <p><a href="<?php echo $adminBaseUrl . 'gallery/del/' . $image->id; ?>" class="btn btn-danger btn-xs" role="button"
                          onclick="return confirm('آیا مطمئن هستید می خواهید عکس (<?php echo $image->title;?>) را حذف کنید ؟')">Remove</a></p>
                </div>
                <input type="hidden" name="path" value="<?php echo $image->path; ?>">
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div> <!-- /container -->
<?php include_once 'footer.php'; ?>
