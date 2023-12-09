<?php
session_start();

if(isset($_COOKIE['active_user']))
{
    $_SESSION['active_user'] = $_COOKIE['active_user'];
    $_SESSION['active_user_type'] = $_COOKIE['active_user_type'];
    $_SESSION['active_user_id'] = $_COOKIE['active_user_id'];
}
?>
