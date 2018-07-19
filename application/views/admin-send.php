<?php include_once 'admin-header.php'; ?>
<!-- Page Content -->
<script src="http://localhost/design-projects/blog/static/tinymce/js/tinymce/tinymce.min.js"></script>
<!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
<!--<script>tinymce.init({selector: '.postBody', directionality: 'ltr', menubar: false});</script>-->
<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help'
        ],
        toolbar: 'insert | undo redo |  styleselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });
</script>
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="post">
            <h1>Send Post</h1>
        </div>
        <div class="col-lg-12">
            <?php if (isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?></div>
        <div class="well">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="form-group center">
                    <select name="catID" class="form-control ">
                        <option value="0">Categories</option>
                        <?php foreach ($cats as $cat): ?>
                            <option value="<?php echo $cat->id ?>" <?php echo ($isEdit and $cat->id == $post->cat_id) ? 'selected' : ''; ?>><?php echo $cat->name ?></option>
                        <?php endforeach; ?>
                    </select>

                    <input class="form-control " type="text" name="title"
                           value="<?php echo ($isEdit) ? $post->title : '' ?>" placeholder="Post title"/>

                    <textarea class="form-control" name="abstract" rows="5"
                              placeholder="Abstract"><?php echo ($isEdit) ? $post->abstract : 'Write abstract' ?></textarea>

                    <img style="width: 300px;height: 200px" src="<?php echo ($isEdit) ? $post->image_url : '' ?>"
                         alt="Choose your picture" class="form-control img-thumbnail" id="img">
                    <input class="form-control" type="file" name="image" id="upload">
                    <input type="hidden" name="url_default" value="<?php echo ($isEdit) ? $post->image_url : '' ?>">

                    <input class="form-control " type="text" name="tags"
                           value="<?php echo ($isEdit) ? $post->tags : '' ?>" placeholder="تگ ها (با کاما جدا کنید)"/>

                    <textarea class="form-control postBody" name="content" rows="7"
                              placeholder="post"><?php echo ($isEdit) ? $post->body : 'Write Your post' ?></textarea>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="  Send  ">
            </form>
        </div>
    </div>
    <script src="http://localhost/7learn/27/blog/static/js/custom.js"></script>
    <?php include_once 'footer.php'; ?>
