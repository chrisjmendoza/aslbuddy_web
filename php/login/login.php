<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/6/17
 * Time: 1:44 PM
 */

require('../lib/db_connect.php');
#session_start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db, $_GET['email']);
    $mypassword = mysqli_real_escape_string($db, $_GET['password']);

    $sql = "SELECT * FROM aslbuddy_db.user WHERE email = '$myusername' and passHash = '$mypassword'";
    $result = mysqli_query($db,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
    }
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    $userType = $row['isInterpreter'];
    $userId = $row['userId'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row


    if($count == 1) {
        $return_data = [
            loginsuccess=> true,
            userId => $userId,
            email => $myusername,
            isInterpreter => $userType

        ];
    } else {
        $return_data = [
            loginsuccess=> false,
            username => $myusername,
            error => "Your Login Name or Password is invalid"
        ];
    }
    $db->close();
    header('Content-Type: application/json');
    echo json_encode($return_data);
}
?>