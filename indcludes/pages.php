<?php 
    if(isSet($_GET['page'])){
        if($_GET['page']=="main"){
            include 'main.php';
        }
        else if($_GET['page']=="art"){
            include 'images.php';
        }
        else if($_GET['page']=="item") {
            include 'item.php';
        }
        else if($_GET['page']=="login") {
            include 'login.php';
        }
        else{
            include('main.php');
        }
    }
    else{
        include('main.php');
    }
?>