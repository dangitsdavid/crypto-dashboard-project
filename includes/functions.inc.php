<?php

// SIGN UP PAGE
// Check Empty Signups
function emptyInputSignup($name, $phone, $username, $email, $pwd, $pwdRepeat)
{
    $result;
    if (empty($name) || empty($phone) || empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Check Invalid Username
function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Check Invalid Email
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Check Password Match
function pwdMatch($pwd, $pwdRepeat)
{
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Check USername Exists
function uidExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE usersUsername = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    // Get Results
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    // Close SQL Connection
    mysqli_stmt_close($stmt);
}

// Check Email Exists
function emailExists($conn, $email)
{
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // Get Results
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    // Close SQL Connection
    mysqli_stmt_close($stmt);
}

// Create User
function createUser($conn, $name, $phone, $username, $email, $pwd)
{
    $sql = "INSERT INTO users (usersName, usersPhone, usersUsername, usersEmail, usersPwd) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./signup.php?error=createfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $name, $phone, $username, $email, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?error=none");
    exit();
}

// LOGIN PAGE
// Check Empty Login
function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// Login User
function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $dbPwd = $uidExists["usersPwd"];

    if ($dbPwd !== $pwd) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($dbPwd === $pwd) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["username"] = $uidExists["usersName"];
        $_SESSION["useruid"] = $uidExists["usersUsername"];
        header("location: ../dashboard/index.php");
        exit();
    }
}
