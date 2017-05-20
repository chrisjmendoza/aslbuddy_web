<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/15/17
 * Time: 7:21 PM
 */

include('../lib/db_connect.php');

    // Username and password sent from form
echo 'Select Statement\n';
    $sql = "SELECT * FROM aslbuddy_db.user";
    $result = mysqli_query($db,$sql);
    var_dump($result);
    $row = $result->fetch_array(MYSQL_BOTH);
    for($i = 0; $i < 1000; $i++) {
    echo $row[$i]."\n";
}

$db->close();
