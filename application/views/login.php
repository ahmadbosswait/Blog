<?php include_once 'header.php'; ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">Log in</h1>

            <!-- Blog Post -->
            <div class="abstract">
                <?php
                if($error){
                    echo "<div class='alert alert-warning'>$errMsg</div>";
                }
                ?>
                <form method="post">
                    <input class="form-control center" type="text" name="user" placeholder="Username"/>
                    <input class="form-control center" type="password" name="pass" placeholder="Password"/>
                    <input class="btn btn-primary" type="submit" value=" log in "/>
                </form>
            </div>

        </div>
        <?php include_once 'footer.php'; ?>
