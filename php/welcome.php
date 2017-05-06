<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 5/6/17
 * Time: 3:09 PM
 */
include('session.php');
?>
<html>

    <head>
        <title>Welcome </title>
    </head>

    <body>
    <h1>Welcome <?php echo $login_session; ?></h1>
    <h2><a href = "login/logout.php">Sign Out</h2>
    </body>
</html>
