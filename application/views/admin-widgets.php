<?php include_once 'admin-header.php'; ?>

<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">

        <div class="col-lg-12">
            <?php if (isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?></div>

            <div class="post">
                <h1>Sidebar</h1>
            </div>

            <div class="well">
                <form role="form" method="post">
                        <input class="form-control" type="text" name="wOrder" value="<?php echo ($isEdit)?$widget->ord:''?>" placeholder="Priority (Num)"/>
                        <input class="form-control" type="text" name="wTitle" value="<?php echo ($isEdit)?$widget->title:''?>" placeholder="Title"/>
                        <textarea class="form-control" rows="5" name="wContent" placeholder="Content"/><?php echo ($isEdit)?$widget->body:''?></textarea>
                        <input type="submit" name="submit" class="btn btn-primary" value="  Send  ">
                </form>
            </div>

            <div class="well">
                <table class="table table-striped table-condensed table-hover">
                    <tr>
                        <td>Title</td>
                        <td>Operate</td>
                    </tr>
                    <?php foreach($widgets as $widget): ?>
                    <tr>
                        <td><?php echo $widget->title ?></td>
                        <td>
                            <a class="delete" onclick="return confirm('Are You Sure ?');" href="<?php echo $adminBaseUrl . 'widgets/del/' . $widget->id; ?>">Delete</a> &nbsp;
                            <a class="delete" href="<?php echo $adminBaseUrl . 'widgets/edit/' . $widget->id; ?>">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
        <?php include_once 'footer.php'; ?>
