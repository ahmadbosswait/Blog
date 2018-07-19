<?php include_once 'header.php'; ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div>You can put Your Details here we call you soon !</div>
        <div class="col-md-8">
            <h1 class="page-header">Contact us</h1>

            <!-- Blog Post -->
            <div class="abstract">
                <?php
                if(isset($msg)){
                    echo "<div class='alert alert-$style'>$msg</div>";
                }
                ?>
                <form method="post">
                    <input class="form-control rtl" type="text" name="name" placeholder="Your name ..."/>
                    <input class="form-control ltr" type="text" name="mail" placeholder="E-mail ..."/>
                    <input class="form-control rtl" type="text" name="title" placeholder="Subject"/>
                    <textarea class="form-control rtl" name="message" rows="7" placeholder="write your message ..."></textarea><br>
                    <input class="btn btn-primary" type="submit" name="sendMail" value=" Send "/>
                </form>
            </div>

        </div>
        <?php include_once 'footer.php'; ?>
