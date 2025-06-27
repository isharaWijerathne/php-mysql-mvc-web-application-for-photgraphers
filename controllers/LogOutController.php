<?php   

session_start();
session_unset();
header('Location: /hnd/public/index.php');