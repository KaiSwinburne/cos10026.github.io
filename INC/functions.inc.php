<?php

function emptyInputSingup($name, $email, $id, $spwd, $spwdre) {
    $result = false; // Initialize with default value
    if (empty($name) || empty($email) || empty($id) || empty($spwd) || empty($spwdre)){
        $result = true;     
    }
    return $result;
}


function invalidUid($id) {
    $result = false; // Initialize with default value
    if (!preg_match("/^[a-zA-Z0-9]*$/", $id)){
        $result = true;     
    }
    return $result;
}

function invalidEmail($email) {
    $result = false; // Initialize with default value
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;     
    }
    return $result;
}


function pwdMatch($spwd, $spwdre) {
    $result = false; // Initialize with default value
    if ($spwd !== $spwdre){
        $result = true;     
    }
    return $result;
}

function UidExists($conn, $id, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $id, $email);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result_data)){
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        mysqli_stmt_close($stmt);
        $result = false;
        return $result;
    }
}

function createUser($conn, $name, $email, $id, $spwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPWD) VALUES(?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = md5($spwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $id, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}


function emptyInputLogin($id, $spwd) {
    $result = false; // Initialize with default value
    if (empty($id) || empty($spwd)){
        $result = true;     
    }
    return $result;
}


function loginUser($conn, $id, $spwd){
    $uidExists = UidExists($conn, $id, $spwd);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $hashedPwd = md5($spwd, PASSWORD_DEFAULT);

    if ($uidExists["usersPWD"] === $hashedPwd) {
        session_start();
        $_SESSION["userid"] = $uidExists["userSId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../manage.php");
        exit();
    } else {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
}