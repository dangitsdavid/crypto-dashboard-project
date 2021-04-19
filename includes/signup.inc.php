<?php

if (isset($_POST["submit"])) {
    // Form Data
    $name = $_POST["inputName"];
    $phone = $_POST["inputPhone"];
    $username = $_POST["inputUid"];
    $email = $_POST["inputEmail"];
    $pwd = $_POST["inputPwd"];
    $pwdRepeat = $_POST["confirmPwd"];

    // Includes Functions
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // Error Handling
    // Check Empty Variables
    if (emptyInputSignup($name, $phone, $username, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    // Check Proper Username
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    // Check Invalid Email Format
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    // Check Password Match
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=passwordnomatch");
        exit();
    }
    // Check if Username Exists
    if (uidExists($conn, $username) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    // Check if Username Exists
    if (emailExists($conn, $email) !== false) {
        header("location: ../signup.php?error=emailtaken");
        exit();
    }
    // Create User
    createUser($name, $phone, $username, $email, $pwd);
} else {
    header("location: ../signup.php");
    exit();
}
