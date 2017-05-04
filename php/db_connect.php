<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/2/17
 * Time: 6:11 PM
 */

$user = 'root';
$password = 'root';
$db = 'inventory';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);