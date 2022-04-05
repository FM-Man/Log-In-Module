<?php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwdRpt = $_POST["pwdRpt"];
        $checkBox = $_POST["checkbox"];

        require_once 'database-handle.php';
        require_once 'functions.php';

        if(emptyInputSignup($name,$email,$pwd,$pwdRpt) !== false){
            header("location: signup.php?error=emptyInput");
            exit();
        }
        
        if(invalidEmail($conn, $email) !== false){
            header("location: signup.php?error=invalidemail");
            exit();
        }

        if(pwdMatch($pwd,$pwdRpt) !== false){
            header("location: signup.php?error=mismatchpwd");
            exit();
        }

        if($checkBox !== true){
            header("location: signup.php?error=untick");
            exit();
        }


        createUser($conn, $name, $email, $pwd);

    }
    else{
        header("location: ./signup.php");
        exit();
    }
?>
