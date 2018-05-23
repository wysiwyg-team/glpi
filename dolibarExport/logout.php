<?php
/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 4/23/2018
 * Time: 6:57 PM
 */
session_start();
session_destroy();

echo 'You have been logged out. <a href="login.php">Go back</a>';
?>