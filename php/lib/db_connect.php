<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/2/17
 * Time: 6:11 PM
 */

$user = 'root';
$password = 'root';
$db = 'aslbuddy_db';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$success = mysqli_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);