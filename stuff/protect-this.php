<?php
    /* Your password */
    $password = 'EasyPass';
echo "<script>console.log('Povedlo se' );</script>";
    if (empty($_COOKIE['password']) || $_COOKIE['password'] !== $password) {
        // Password not set or incorrect. Send to login.php.
        header('Location: index.php');
        echo "<script>console.log('Povedlo se' );</script>";
        exit;
    }
?>