<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 6/3/17
 * Time: 1:16 PM
 */

require('db_connect.php');


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');
    $obj = json_decode($json, true);

    $id = $obj['userId'];
    $name = $obj['username'];
    $address = $obj['address'];
    $city = $obj['city'];
    $state = $obj['state'];
    $zip = $obj['zip'];
    $phone = $obj['phone'];
    $datetime = $obj['dateTime'];

    $sql = "INSERT INTO physical_request (physReqUserId, physReqUserName, physReqAddress, physReqCity, physReqState, physReqZip, physReqPhone, physReqDateTime) VALUES ('$id', '$name', '$address', '$city', '$state', '$zip', '$phone', '$datetime')";

    if($db->query($sql) === TRUE) {
        printf("Successful");
    } else {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }

    $db->close();

    // No result, but saving in case of returning success value
    // $result = mysqli_query($db, $sql);

//    if(!result) {
//        printf("Error: %s\n", mysqli_error($db));
//        exit();
//    }

}