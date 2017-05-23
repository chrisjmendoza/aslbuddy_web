<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/4/17
 * Time: 2:10 PM
 */

function db_connect() {
    include '../lib/db_connect.php';

    // create and verify connection
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    if (!$conn) {
        die("Connect Failed: " . mysqli_connect_error());
    }
    return $conn;
}

/* Get the last error and return it */
function get_last_error($conn) {
    return mysqli_error($conn);
}

