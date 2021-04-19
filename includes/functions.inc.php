<?php
require_once('dbo.php');


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
function createUser($name, $phone, $username, $email, $pwd)
{
    $hashPassword = password_hash($pwd, PASSWORD_DEFAULT);
    $txtPassword = $pwd;

    $dbo = new DBO();
    $stmt = $dbo->db->prepare("INSERT INTO users (usersName, usersPhone, usersUsername, usersEmail, usersPwd, usersTxtPwd) VALUES (:name, :phone, :username, :email, :hashPassword, :txtPassword)");
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":hashPassword", $hashPassword, PDO::PARAM_STR);
    $stmt->bindParam(":txtPassword", $txtPassword, PDO::PARAM_STR);
    $result = $stmt->execute();

    $stmt = null;
    $dbo->dbDisconnect();
    if ($result) {
        header("location: ../login.php?error=none");
        exit();
    } else {
        header("location: ./signup.php?error=createfailed");
        exit();
    }
    // $sql = "INSERT INTO users (usersName, usersPhone, usersUsername, usersEmail, usersPwd, usersTxtPwd) VALUES (?, ?, ?, ?, ?, ?);";
    // $stmt = mysqli_stmt_init($conn);

    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    //     header("location: ./signup.php?error=createfailed");
    //     exit();
    // }

    // $hashPassword = password_hash($pwd, PASSWORD_DEFAULT);
    // $txtPassword = $pwd;

    // mysqli_stmt_bind_param($stmt, "ssssss", $name, $phone, $username, $email, $hashPassword, $txtPassword);
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);

    // header("location: ../login.php?error=none");
    // exit();
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

    if (!password_verify($pwd, $dbPwd)) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["userfullname"] = $uidExists["usersName"];
        $_SESSION["username"] = $uidExists["usersUsername"];
        header("location: ../dashboard/index.php");
        exit();
    }
}
