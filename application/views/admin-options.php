<?php include_once 'admin-header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="post">
                <h1>Setting</h1>
            </div>
            <div class="well">
                <form role="form" method="post">
                    <table class="table table-striped table-condensed table-hover">
                        <tr>
                            <td>Title</td>
                            <td>Value</td>
                        </tr>
                        <tr>
                            <td>Site Title</td>
                            <td>
                                <input class="form-control w50p" type="text" name="options[site_title]" value="<?php echo isset($options['site_title'][0])?$options['site_title'][0]:''; ?>" placeholder="عنوان وبسایت شما"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                <input class="form-control w50p ltr" type="text" name="options[site_url]" value="<?php echo isset($options['site_url'][0])?$options['site_url'][0]:''; ?>" placeholder="Weblog URL"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Comments Like</td>
                            <td>
                                <select name="options[comment_like]" class="form-control w30p">
                                    <option value="1" <?php echo (isset($options['comment_like'][0]) and $options['comment_like'][0]=='1')?'selected':''; ?>>Active</option>
                                    <option value="0" <?php echo (isset($options['comment_like'][0]) and $options['comment_like'][0]=='0')?'selected':''; ?>>Deactive</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Posts Count</td>
                            <td>
                                <input class="form-control w30p center" type="text" name="options[post_per_page]" value="<?php echo isset($options['post_per_page'][0])?$options['post_per_page'][0]:''; ?>" placeholder="10" value="10"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Date Format</td>
                            <td>
                                <input class="form-control w30p" type="text" name="options[date_format]" value="<?php echo isset($options['date_format'][0])?$options['date_format'][0]:''; ?>" placeholder="d F Y"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Background Color</td>
                            <td>
                                <input class="form-control w30p" type="text" name="options[bg_color]" value="<?php echo isset($options['bg_color'][0])?$options['bg_color'][0]:''; ?>"/>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" name="submit" class="btn btn-primary" value="  Save  ">
                </form>
            </div>

        </div>
        <?php include_once 'footer.php'; ?>
