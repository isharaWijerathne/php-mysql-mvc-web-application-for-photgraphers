<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['auth'])) {
    header('Location: /hnd/auth/index.php');
    exit;
}

