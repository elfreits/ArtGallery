<?php
    require_once("../indcludes/confDB.php");
    session_start();
    if(isSet($_SESSION['logged']) && $_SESSION['logged'] == true && isSet($_SESSION['accountType']) && $_SESSION['accountType'] == 'admin'){}
    else header("Location: ../index.php?page=login");
    ?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
        <link rel="stylesheet" href="main.css">
        <script src="http://localhost/ArtGallery/js/main.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <div class="admin-panel-header">
            <h2>admin panel</h2>
            <a href="../source.php?action=logout"><i class="fas fa-power-off"></i></a>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills mh-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-images-tab" data-toggle="pill" href="#v-pills-images" role="tab" aria-controls="v-pills-images" aria-selected="true">obrazy</a>
                    <a class="nav-link" id="v-pills-events-tab" data-toggle="pill" href="#v-pills-events" role="tab" aria-controls="v-pills-events" aria-selected="false">wydarzenia</a>
                    <a class="nav-link" id="v-pill-gadgeds-tab" data-toggle="pill" href="#v-pill-gadgeds" role="tab" aria-controls="v-pill-gadgeds" aria-selected="false">gadżety</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">ustawienia</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-images" role="tabpanel" aria-labelledby="v-pills-images-tab">xxxxxx</div>
                    <div class="tab-pane fade" id="v-pills-events" role="tabpanel" aria-labelledby="v-pills-events-tab">...</div>
                    <div class="tab-pane fade" id="v-pill-gadgeds" role="tabpanel" aria-labelledby="v-pill-gadgeds-tab">sadsaasdas</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                </div>
            </div>
        </div>
    </body>
</html>
