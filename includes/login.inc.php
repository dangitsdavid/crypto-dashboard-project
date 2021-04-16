<?php

if (isset($_POST["submit"])) {
    $username = $_POST["inputUid"];
    $pwd = $_POST["inputPwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../login.php?error=missinginput");
        exit();
    }

    loginUser($conn, $username, $pwd);
} else {
    header("location: ../login.php");
    exit();
}
