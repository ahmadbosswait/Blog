<?php

class Ajax extends Controller
{

    function index()
    {
    }

    function cLike()
    {
        // is valid ajax request ?
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            if (isset($_POST['cRateStr'])) {
                sleep(1);
                $arr = explode('-', $_POST['cRateStr']);
                $blog = $this->loadModel('blog_model');
                $this->loadPlugin('auth');
                $isAdmin = isLoggedIn();

                $blog->rateComment($arr[0],$arr[1],$isAdmin);
                echo $blog->getCommentRate($arr[0]);
            }
        }else{
            echo 'Invalid Request';
        }
    }

}

?>
