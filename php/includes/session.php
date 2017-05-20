<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/6/17
 * Time: 3:14 PM
 */
    include('../lib/db_connect.php');

    session_start();

    $user_check = $_SESSION['login_user'];

    $ses_sql = mysqli_query($db, "select userName from user where username = '$user_check' ");

    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

    $login_session = $row['username'];

    if(!isset($_SESSION['login_user'])) {
        header("location:../login/login.php");
    }