<?php include_once 'admin-header.php'; ?>

<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <div class="post">
                <h1>Comments</h1>
            </div>

            <div class="well">
                <table class="table table-striped table-condensed table-hover">
                    <tr>
                        <td style="width: 10%">User</td>
                        <td style="width: 55%">Comment</td>
                        <td style="width: 20%">Post + Date</td>
                        <td style="width: 15%">Operation</td>
                    </tr>
                    <?php foreach($comments as $cm){ ?>

                    <tr class="<?php echo $cm->status ?>">
                        <td><?php echo $cm->author ?></td>
                        <td><?php echo $cm->body ?></td>
                        <td><?php echo $cm->comment_date ?></td>
                        <td>
                            <a class="delete" onclick="return confirm('Are You Sure ?');" href="<?php echo $adminBaseUrl . 'comments/del/' . $cm->id; ?>">Delete</a> &nbsp;
                            <?php if($cm->status == 'pending'){ ?>
                                <a class="delete" href="<?php echo $adminBaseUrl . 'comments/approve/' . $cm->id; ?>">Confirm</a> &nbsp;
                            <?php }else{ ?>
                                <a class="delete" href="<?php echo $adminBaseUrl . 'comments/unapprove/' . $cm->id; ?>">Cancel</a> &nbsp;
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>

                </table>
            </div>

        </div>
        <?php include_once 'footer.php'; ?>