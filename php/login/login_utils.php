<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/3/17
 * Time: 8:12 PM
 */

# Starts and ensures the variable of this session, if session is invalid,
# will redirect to logout.php which correctly destroys the session

function get_user_details() {
    # Print user details in the banner
    return "<span id=\"userinfo\"><strong>" . $_SESSION["user_type"] . "</strong>" .
        "&emsp;" . $_SESSION["name"] . " -- " . $_SESSION["username"] . "</span>";
}

# is_logged_in returns whether or not the user is logged in by checking session vars
function is_logged_in() {
    return (isset($_SESSION["user_id"]) && isset($_SESSION["user_type"])
        && isset($_SESSION["username"]) && isset($_SESSION["name"]));
}

# Sends the user to login.php & kills the current page
function to_login() {
    header("Location: ../login/logout.php");
    die();
}
?>