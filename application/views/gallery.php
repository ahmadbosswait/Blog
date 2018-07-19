<?php include_once 'header.php'; ?>
<!-- Page Content -->
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" id="header-title"></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class=" col-md-12">
                            <img class="img-responsive" id="modal-img" src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="my-gallery">
    <div class="row">
        <?php foreach ($images as $image): ?>
            <div class="col-md-3">
                <img style="height: 200px;margin-bottom: 30px;cursor: pointer" class="img-responsive img-thumbnail"
                     src="<?php echo $image->image_url; ?>">
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?php include_once 'footer.php'; ?>
