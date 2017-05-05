<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/3/17
 * Time: 8:25 PM
 */

    session_start();
    session_destroy();
    session_regenerate_id(true);
    header("Location: login.html");
    die();
?>