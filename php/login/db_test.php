<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/15/17
 * Time: 7:21 PM
 */

$user = 'root';
$password = 'root';
$db = 'aslbuddy_db';
$host = 'localhost';
$port = 8889;

echo 'Initiating Link';
$link = mysqli_init();
$success = mysqli_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);

    // Username and password sent from form
echo 'Select Statement';
    $sql = "SELECT * FROM aslbuddy_db.user";
    $result = mysqli_query($db,$sql);
    var_dump($result);
    $row = $result->fetch_array(MYSQL_BOTH);
    echo $row[1]; // or echo $row[1]
