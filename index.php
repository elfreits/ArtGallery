<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>shop</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="shop.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
    <div id="header-website">
        <div class="center-website">
            <div class="logo-website">
                <div class="logo-textbox-website">
                    <div class="logo-text-website">mery</div>
                    <div class="logo-text-website">art gallery</div>
                </div>
                <div id="nav-website">
                    <div class="button-nav-website"><a href="?page=main">główna</a></div>
                    <div class="button-nav-website"><a href="?page=images">obrazy</a></div>
                    <div class="button-nav-website"> wydarzenia</div>
                    <div class="button-nav-website">gadżety</div>
                    <div class="button-nav-website">kontakt</div>
                    <div class="button-nav-website">logowanie</div>
                    <div class="button-nav-website"><i class="fas fa-shopping-basket"></i><div class="basket-dot-website">1</div></div>
                </div>
                
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>

    <?php 
        include 'pages.php';
    ?>
    <div id="footer">
        <div class="center-website">
            <div class="footer-box-website">
                <div class="footer-header-website">Menu</div>
                <div class="footer-buttons-website">główna</div>
                <div class="footer-buttons-website">obrazy</div>
                <div class="footer-buttons-website">gadżety</div>
                <div class="footer-buttons-website">wydarzenia</div>
            
            </div>
            <div class="footer-box-website">
                <div class="footer-header-website">konta</div>
                <div class="footer-buttons-website">logowanie</div>
                <div class="footer-buttons-website">rejestracja</div>
                <div class="footer-buttons-website">dane</div>
            
            </div>
            <div class="footer-box-website">
                <div class="footer-header-website">socialmedia</div>
                <div class="footer-buttons-website">instagram</div>
                <div class="footer-buttons-website">facebook</div>
                <div class="footer-buttons-website">youtube</div>
            
            </div>
            <div class="footer-box-website">
                <div class="footer-header-website">kontakt</div>
                <div class="footer-buttons-website">biuro@merygallery.pl</div>
            </div>
            <div style="clear:both;"></div>
            <p class="footer-text-website">&copy; Mery Art Gallery 2020 Wszelkie prawa zastrzeżone.</p>
        </div>
    </div>
</body>
</html>