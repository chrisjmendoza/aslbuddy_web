<?php
include_once("../login/login_utils.php");

#Author: Kellan Nealy & Chris Mendoza
# Accepts POST form data from "login.php", logs in the user & redirects
# to "hoh_landing.php", "interpreter_landing.php", or "admin_landing.php"
# DOES NOT output any html content

# IMPORTANT: If you try to login to an existing session, it will send you
# back to login after destroying that session. No errors passed yet.

session_start();
if (!is_logged_in()) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    # Initial validation of login information using RegEx
    validate($username, $password);

    # Connect to and query DB to check passed username/password
    $mysqli = get_db_connection();
    $user_exists = false;

    # Store user info from the query
    $user_info = array();

    # SELECT queries return a result set
    if ($result = $mysqli->query("SELECT userId, isInterpreter, email FROM user WHERE username = \"$username\" AND passHash = \"$password\";")) {
        foreach ($result as $row) {
            foreach ($row as $element) {
                if ($element) {
                    # DEBUG: echo $element . "<br />";
                    $user_exists = true;
                    $user_info[] = $element;
                }
            }
        }
        # Close result set
        $result->close();
    }

    # what happens when the query didn't find user
    if (!$user_info) {
        $user_exists = false;
        echo "user credentials query failed";
        to_login();
    }

    # DEBUG: echo $user_exists;
    # DEBUG: print_r($user_info);

    # set the session variables (user_id, user_type, username)
    # print_r($user_info);
    $_SESSION["user_id"] = $user_info[0];
    $type_id = $user_info[1];
    $_SESSION["user_type"] = get_user_type($type_id);
    $_SESSION["username"] = $user_info[2];

    #store cookie so we can see time of last visit! this is an extra feature
    $time_expire = time() + 60 * 60 * 24 * 7;
    setcookie("last_visit", date("D y M d, g:i:s a", $time_expire));

    # can greet the user at landing page if session variables stored!!
    # redirect to list page
    to_list_page();

} else {
    # user already has a session, so lets assume they
    # want to end it and login again
    session_destroy();
    session_regenerate_id(true);
    to_login();
}

# validate uses regular expressions to validate input, redirects to start if invalid
function validate($username, $password)
{
    #At least one letter or number for each regex
    $name_regex = "/^[a-z|0-9|A-Z]+$/";
    $password_regex = "/^[a-z|0-9|A-Z]+$/";
    if (preg_match($name_regex, $username) != 1 || preg_match($password_regex, $password) != 1) {
        to_login();
    }
}

#Gets the user_type as a string from the typeIDs stored in the DB
function get_user_type($TypeId)
{
    if ($TypeId == 1) {
        return "hoh";
    } else if ($TypeId == 2) {
        return "interpreter";
    } else {
        return "";
    }
}

#sends the user to the correct list page & kills the current page
function to_list_page()
{

    if ($_SESSION["user_type"] == "hoh") {
        header("Location: ../hoh/main.php");
    } else if ($_SESSION["user_type"] == "interpreter") {
        header("Location: ../interpreter/main.php");
    }

    die();
}

# uses internally stored credentials to create and return DB connection
# as a Mysqli PHP object.
function get_db_connection()
{
    include '../lib/db_connect.php';
    //create and verify connection
    $mysqli_obj = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if ($mysqli_obj->connect_error) {
        die('DB Connection Error: ' . $mysqli_obj->connect_errno . $mysqli_obj->connect_error);
    }
    return $mysqli_obj;
}

?>