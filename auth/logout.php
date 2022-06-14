<?php

session_start();
$_SESSION['message'] = 'Berhasil Logout';
header("Location: login.php");
session_destroy();
exit();
