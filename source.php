<?php
    require_once("indcludes/confDB.php");
    session_start();
    $conn = mysqli_connect($host, $userDB, $passwordDB);
    $conn->query("SET NAMES 'utf8'");
    mysqli_select_db($conn, $base);
    if(isSet($_GET['action'])){
        $action = $_GET['action'];
    }
    else if(isSet($_POST['action'])){
        $action = $_POST['action'];
    }
    else{
        $action = "";
    }
    switch($action){
        case 'login':
            $login = $_POST['login'];
            $password = $_POST['password'];
            $login = htmlentities($login, ENT_QUOTES, "UTF-8");
            $password = htmlentities($password, ENT_QUOTES, "UTF-8");
            $query = mysqli_query($conn, "SELECT login, password, accountType FROM users WHERE login ='$login'");
            $numRows = mysqli_num_rows($query);
            if($numRows > 0){
                while ($row = mysqli_fetch_array($query)) {$password2 = $row['password']; $accountType = $row['accountType'];}
                if($password == $password2){
                    $_SESSION['logged'] = true;
                    $_SESSION['login'] = $login;
                    $_SESSION['accountType'] = $accountType;
                    header("Location: ./ADMINPANEL/index.php");
                }
                else{
                    $_SESSION['loginError'] = "niepoprawne hasło";
                    header("Location: index.php?page=login");
                }
            }
            else{
                $_SESSION['loginError'] = "nie prawidłowy adres email lub login";
                header("Location: index.php?page=login");
            }
            break;
        case "logout":
                unset($_SESSION['logged']);
                unset($_SESSION['login']);
                unset($_SESSION['accountType']);

                $_SESSION['alertSuccess'] = "wylogowano pomyślnie";
                header("Location: index.php?page=login");
            break;
        default:
            echo 'Nie znaleziono akcji!';
    }
    mysqli_close($conn);