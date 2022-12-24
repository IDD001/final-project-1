<?php
require_once('./config/Login.php');
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");
