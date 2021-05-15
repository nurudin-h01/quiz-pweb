<?php 

session_start();
session_unset();
session_destroy();

if (isset($_COOKIE['login'])) {
    setcookie('login', '',);
    setcookie('full_name', '',);
    setcookie('username', '');
} 

header("Location:index.php")
?>