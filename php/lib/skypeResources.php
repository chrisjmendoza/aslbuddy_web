<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 6/13/17
 * Time: 4:45 PM
 */

require('db_connect.php');

if($_SERVER["REQUEST_METHOD"] == "GET") {

    // Select an interpreter based on the setting that they are available for a call
    $sql = "SELECT * FROM aslbuddy_db.user WHERE isInterpreter = '1' AND canCall = '1' ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($db, $sql);
    if(!result) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $skypeName = $row['skypeName'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
        echo $skypeName;
    } else {
        echo "Error";
    }

    $db -> close();

}