<?php

if (isset($_POST["submit"])){
    $id = $_POST["id"];
    $spwd = $_POST["spwd"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($id, $spwd)) {
        header("Location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $id, $spwd);
}

else{
    header("location: ../login.php");
    exit();
}
