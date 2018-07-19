<?php

class Auth extends Controller
{
    function index()
    {
        $this->login();
    }

    function login()
    {
        $error = false;
        $errMsg = '';
        $this->loadPlugin('auth');
        if (isset($_POST['user'], $_POST['pass'])) {
            if (doLogin($_POST['user'], $_POST['pass'])) {
                $this->redirect('');
            } else {
                $error = true;
                $errMsg = 'اطلاعات ورود اشتباه است.';
            }
        }
        $template = $this->loadView('login');
        $template->set('title', 'ورود کاربر');
        $template->set('error', $error);
        $template->set('errMsg', $errMsg);
        $template->render();
    }

    function logout()
    {
        $this->loadPlugin('auth');
        doLogout();
        $this->redirect('');
    }
}