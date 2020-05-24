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
                    header("Location: /");
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
        case "addImage":
            if(isSet($_SESSION['logged']) && $_SESSION['logged'] == true && isSet($_SESSION['accountType']) && $_SESSION['accountType'] == 'admin'){
                $name = $_POST['name'];
                $author = $_POST['author'];
                $sizeX = $_POST['sizeX'];
                $sizeY = $_POST['sizeY'];
                $sizeUnit = $_POST['sizeUnit'];
                $description = $_POST['description'];
                $price = $_POST['price'];

                $name = htmlentities($name, ENT_QUOTES, "UTF-8");
                $author = htmlentities($author, ENT_QUOTES, "UTF-8");
                $sizeX = htmlentities($sizeX, ENT_QUOTES, "UTF-8");
                $sizeY = htmlentities($sizeY, ENT_QUOTES, "UTF-8");
                $sizeUnit = htmlentities($sizeUnit, ENT_QUOTES, "UTF-8");
                $description = htmlentities($description, ENT_QUOTES, "UTF-8");
                $price = htmlentities($price, ENT_QUOTES, "UTF-8");

                $errorInfo = "";
                $errors = 0;
                if(empty($name)){
                   $errorInfo = $errorInfo." Brak nazwy,";
                   $errors++;
                }
                if(empty($author)){
                    $errorInfo = $errorInfo." Brak autora,";
                    $errors++;
                }
                if(empty($sizeX)){
                    $errorInfo = $errorInfo." Brak szerokości,";
                    $errors++;
                }
                if(empty($sizeY)){
                    $errorInfo = $errorInfo." Brak wysokości,";
                    $errors++;
                }
                if(empty($sizeUnit)){
                    $errorInfo = $errorInfo." Brak jednostki,";
                    $errors++;
                }
                if(empty($description)){
                    $errorInfo = $errorInfo." Brak opisu,";
                    $errors++;
                }
                if(empty($price)){
                    $errorInfo = $errorInfo." Brak ceny,";
                    $errors++;
                }
                if (is_uploaded_file(($_FILES['image']['tmp_name']))){
                    $maxSize= 1024*5; //MAX SIZE 5MB
                    if($_FILES['image']['size'] >= $maxSize){
                        if ($_FILES['image']['type'] == "image/jpeg" ) {
                            $imageName = 'IMG_'.date("dmYHis").rand(000, 999).'.jpg';
                            if($errors == 0){
                                if(move_uploaded_file($_FILES['image']['tmp_name'],'./img/uploads/'.$imageName)){
                                    $date = Date("Y-m-d H:i:s");
                                    if(mysqli_query($conn,"INSERT INTO items (id, name, type, sizeX, sizeY, sizeUnit, price, author, description, image, createDate) VALUES (NULL, '$name', '1', '$sizeX', '$sizeY', '$sizeUnit', '$price', '$author', '$description', '$imageName', '$date')")){
                                        //success: item added
                                        $_SESSION['itemSuccess'] = "Succes: Przedmiot został dodany pomyślnie";
                                        header('Location: /ADMINPANEL');
                                    }
                                    else{
                                        $errorInfo = "Nie udało się dodać przedmiotu";
                                        unlink("./img/uploads/".$imageName);
                                        $_SESSION['itemError'] = "ERROR: nie udało się dodac przedmiotu. ERRORS: ".$errorInfo;
                                        header('Location: /ADMINPANEL');
                                    }
                                }
                                else{
                                    //error: the file not uploaded
                                    $errorInfo = $errorInfo." Plik nie został przesłany";
                                    $_SESSION['itemError'] = "ERROR: nie udało się dodac przedmiotu. ERRORS: ".$errorInfo;
                                    header('Location: /ADMINPANEL');
                                }
                            }
                            else{
                                $_SESSION['itemError'] = "ERROR: nie udało się dodac przedmiotu. ERRORS: ".$errorInfo;
                                header('Location: /ADMINPANEL');
                            }
                        }
                        else{
                            //error: the file has an invalid extension
                            $errorInfo = $errorInfo." Niepoprawne rozszeżenie pliku,";
                            $_SESSION['itemError'] = "ERROR: nie udało się dodac przedmiotu. ERRORS: ".$errorInfo;
                            header('Location: /ADMINPANEL');
                        }
                    }
                    else{
                        //error: the file is too large
                        $errorInfo = $errorInfo." Plik jestza duży,";
                        $_SESSION['itemError'] = "ERROR: nie udało się dodac przedmiotu. ERRORS: ".$errorInfo;
                        header('Location: /ADMINPANEL');
                    }
                }
                else{
                    //error: the file not found
                    $errorInfo = $errorInfo." nie znaleziono pliku,";
                    $_SESSION['itemError'] = "ERROR: nie udało się dodac przedmiotu. ERRORS: ".$errorInfo;
                    header('Location: /ADMINPANEL');
                }
            }
            else{
                //error: no permission
                $errorInfo = "brak uprawnień";
                $_SESSION['itemError'] = "ERROR: nie udało się dodac przedmiotu. ERRORS: ".$errorInfo;
            }
            break;
        case "dropItem":
            if(isSet($_SESSION['logged']) && $_SESSION['logged'] == true && isSet($_SESSION['accountType']) && $_SESSION['accountType'] == 'admin') {
                $id = $_GET['id'];
                $query = mysqli_query($conn,"SELECT image FROM items WHERE id=".$id);
                while($row=mysqli_fetch_array($query)) {
                    $image = $row['image'];
                }
                if(mysqli_query($conn,"DELETE FROM items WHERE id=".$id)){
                    $_SESSION['itemSuccess'] = "Success: Przedmiot został usunięty";
                    unlink("./img/uploads/".$image);
                    header('Location: /ADMINPANEL');
                }
                else{
                    $_SESSION['itemError'] = "ERROR: przedmiot nie został usunięty";
                    header('Location: /ADMINPANEL');
                }
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