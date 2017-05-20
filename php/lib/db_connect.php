<?php
/**
 * Author: Chris Mendoza
 * Date: 5/2/17
 * Time: 6:11 PM
 */

define('DB_SERVER', 'aslbuddydb.softdev.xyz:3306');
define('DB_USERNAME', 'aslbuddy');
define('DB_PASSWORD', 'helpful1');
define('DB_DATABASE', 'aslbuddy_db');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully\n";
