<?php 
    if(isSet($_GET['page'])){
        if($_GET['page']=="main"){
            include 'main.php';
        }
        else if($_GET['page']=="images"){
            include 'images.php';
        }
        else{
            include('main.php');
        }
    }
    else if(isSet($_GET['item'])){
        
    }
    else{
        include('main.php');
    }
?>