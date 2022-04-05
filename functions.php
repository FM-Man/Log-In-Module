<?php

function emptyInputSignup($name,$email,$pwd,$pwdRpt){
    $result;
    if(empty($name) || empty($email) || empty($pwd) || empty($pwdRpt)){
        $result = true;
    }
    else $result = false;

    return $result;
}

function pwdMatch($pwd,$pwdRpt){
    if($pwd !== $pwdRpt){
        return true;
    }
    else{
        return false;
    }
}

function invalidEmail($conn, $email){
    $sql = "SELECT * FROM user WHERE userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if(mysqli_fetch_assoc($resultData)){
        
    }
}