<?php include_once 'admin-header.php'; ?>
<div class="container">
    <div class="row">

        <div class="col-lg-12">
            <div class="post">
                <h1>Categories</h1>
            </div>
            <div class="well">
                <form method="post">
                    <input class="form-control w30p" type="text" name="catName" placeholder="Cat Name"/>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="well">
                <table class="table table-striped table-condensed table-hover">
                    <tr>
                        <td>id</td>
                        <td>Categories</td>
                        <td>Operate</td>
                    </tr>
                    <?php foreach ($cats as $cat): ?>
                    <tr>
                        <td><?php echo $cat->id; ?></td>
                        <td><?php echo $cat->name; ?></td>
                        <td>
                            <a class="delete" href="<?php echo $adminBaseUrl . 'cats/del/' . $cat->id; ?>"
                               onclick="return confirm('آیا مطمئن هستید می خواهید دسته (<?php echo $cat->name;?>) را حذف کنید ؟')">Delete</a> &nbsp;&nbsp;
                        </td>
                    </tr>
                        <?php endforeach; ?>
                </table>
            </div>

        </div>
        <?php include_once 'footer.php'; ?>
