<!DOCTYPE html>
<!-- author Joe McLaughlin -->
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../../style/site.css">
<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/4/17
 * Time: 6:02 PM
 */
    require '../lib/db_connect.php';
    require 'includes/functions_inc.php';

    // Current page name, stripped of folder path
define('THIS PAGE', basename($_SERVER['PHP_SELF']));

# Below are page specific variables/settings.
switch(THIS_PAGE) {
    case 'main.php':
        $title = "ASLBuddy - User Main Page";
        $header = "Main Page";
        break;
    # ADD MORE PAGES HERE
    default:
        $title = "ASLBuddy - ";
        $header = "ASLBuddy - ";
}
?>
    <title>
        <?=$title;?>
    </title>
</head>
<body>
    <nav>
        <ul>
        <li class="left"><a href="../hoh/main.php">HOH Main</a></li>
        <li class="left"><a href="../interpreter/main.php">HOH Main</a></li>
        <li class="left"><a href="../../login/logout.php">Logout</a></li>
        </ul>
    </nav>
<main>
    <h1><?=$header;?></h1>