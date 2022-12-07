<?php

// DESTORY SESSION AND REDIRECT TO LOGIN PAGE
session_start();
unset($_SESSION['email']);
session_destroy();
header("Location:http://localhost/phpsession/login.php");
