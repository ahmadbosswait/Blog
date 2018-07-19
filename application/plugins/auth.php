<?php
include_once APP_DIR . 'config/config.php';

function doLogin($user, $pass)
{
    global $config;
    if ($user == $config['adminUser'] and $pass == $config['adminPass']) {
        $_SESSION['user'] = $config['adminUser'];
        $_SESSION['name'] = $config['adminName'];
        return true;
    }
    return false;
}

function doLogout()
{
    unset($_SESSION['user'], $_SESSION['name']);
    return true;
}

function isLoggedIn()   // isAdmin()
{
    if (isset($_SESSION['user'], $_SESSION['name'])) {
        return true;
    }
    return false;
}