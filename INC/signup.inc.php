<?php
if (isset($_POST["sign-submit"])) {
    $name = $_POST["sign-name"];
    $email = $_POST["sign-email"];
    $id = $_POST["sign-ID"];
    $spwd = $_POST["sign-pwd"];
    $spwdre = $_POST["sign-pwdre"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSingup($name, $email, $id, $spwd, $spwdre)) {
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($id)) {
        header("Location: ../signup.php?error=invalidID");
        exit();
    }

    if (invalidEmail($email)) {
        header("Location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($spwd, $spwdre)) {
        header("Location: ../signup.php?error=passworddontmatch");
        exit();
    }

    if (UidExists($conn, $id, $email)) {
        header("Location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $id, $spwd);
    exit();
} else {
    header("Location: ../signup.php");
    exit();
}
?>
