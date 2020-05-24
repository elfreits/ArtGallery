<?php
    require_once("../indcludes/confDB.php");
    session_start();
    if(isSet($_SESSION['logged']) && $_SESSION['logged'] == true && isSet($_SESSION['accountType']) && $_SESSION['accountType'] == 'admin'){}
    else header("Location: ../index.php?page=login");

    $conn = mysqli_connect($host, $userDB, $passwordDB);
    $conn->query("SET NAMES 'utf8'");
    mysqli_select_db($conn, $base);
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
        <script>

        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <div class="admin-panel-header">
            <h2>admin panel</h2>
            <a href="../"><i class="fas fa-sign-out-alt"></i></a>
            <a href="../source.php?action=logout"><i class="fas fa-power-off"></i></a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 full-screen">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-images-tab" data-toggle="pill" href="#v-pills-images" role="tab" aria-controls="v-pills-images" aria-selected="true">obrazy</a>
                        <a class="nav-link" id="v-pills-events-tab" data-toggle="pill" href="#v-pills-events" role="tab" aria-controls="v-pills-events" aria-selected="false">wydarzenia</a>
                        <a class="nav-link" id="v-pill-gadgeds-tab" data-toggle="pill" href="#v-pill-gadgeds" role="tab" aria-controls="v-pill-gadgeds" aria-selected="false">gadżety</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">ustawienia</a>
                    </div>
                </div>
                <div class="col-9 full-screen">
                    <div class="tab-content" id="v-pills-tabContent">
                        <?php
                            if(isSet($_SESSION['itemSuccess'])){echo '<div class="align-self-center alert alert-success text-center" role="alert">'.$_SESSION['itemSuccess'].'</div>'; unset($_SESSION['itemSuccess']);}
                            if(isSet($_SESSION['itemError'])){echo '<div class="align-self-center alert alert-danger text-center" role="alert">'.$_SESSION['itemError'].'</div>'; unset($_SESSION['itemError']);}
                        ?>
                        <div class="tab-pane fade show active" id="v-pills-images" role="tabpanel" aria-labelledby="v-pills-images-tab">
                            <div class="btn button-add" type="button" data-toggle="collapse" data-target="#addImage" aria-expanded="false" aria-controls="addImage">dodaj obraz  &nbsp;<i class="fas fa-plus"></i></div>
                            <div class="collapse" id="addImage" data-parent="#addImage">
                                <div class="card card-body">
                                    <form enctype="multipart/form-data" method="post" action="../source.php">
                                        nazwa:<br />
                                        <input class="full" type="text" name="name"><br />
                                        Autor:<br />
                                        <input class="full" type="text" name="author"><br />
                                        Cena:<br />
                                        <input class="full" type="number" name="price"><br />
                                        Wymiary:<br />
                                        <label><input class="small" type="number" name="sizeY" min="0"> x <input class="small" type="number" name="sizeX" min="0"> <select name="sizeUnit"><option>cm</option><option>mm</option><option>m</option></select></label><br />
                                        Obrazek:<br />
                                        <label class="add-image-btn">
                                            <input type="file" onchange="onFileSelected(event)" name="image">
                                            <i class="fa fa-plus align-middle" id="addImageBtnIcon"></i>
                                            <img src="" width="100px" height="100px" alt="add" id="myimage" style="display: none;">
                                        </label><br />
                                        Opis:<br />
                                        <textarea  class= "full" name="description"></textarea><br />
                                        <input type="hidden" name="action" value="addImage">
                                        <input type="submit" value="dodaj" class="btn button-add">
                                    </form>

                                </div>
                            </div>
                            <?php
                            $query = mysqli_query($conn, "SELECT id, author, name, price, sizeX, sizeY, sizeUnit, image, description FROM items WHERE type = 1");
                            while($row = mysqli_fetch_array($query)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $price = $row['price'];
                                $author = $row['author'];
                                $image = $row['image'];
                                $sizeX = $row['sizeX'];
                                $sizeY = $row['sizeY'];
                                $sizeUnit = $row['sizeUnit'];
                                $description = $row['description'];
                                echo '<div class="item-box">
                                        <table class="float-left">
                                            <tr>
                                                <td rowspan="2"><img src="../img/uploads/'.$image.'"</td>
                                                <td class="name"><h4>'.$name.'</h4></td>
                                            </tr>
                                            <tr>
                                                <td class="author"><h6>'.$author.'</h6></td>
                                            </tr>
                                        </table>
                                        <table class="float-right">
                                            <tr>
                                                <td><div class="btn button-info" type="button" data-toggle="collapse" data-target="#moreInfo'.$id.'" aria-expanded="false" aria-controls="moreInfo'.$id.'">info &nbsp;<i class="fas fa-info-circle"></i></div></td>
                                                <td><div class="btn button-edit" type="button" data-toggle="collapse" data-target="#edit'.$id.'" aria-expanded="false" aria-controls="edit'.$id.'">edytuj &nbsp;<i class="fas fa-edit"></i></div></td>
                                                <td><div class="btn button-delete" type="button" data-toggle="collapse" data-target="#delete'.$id.'" aria-expanded="false" aria-controls="delete'.$id.'">usuń &nbsp;<i class="fas fa-trash-alt"></i></div></td>
                                            </tr>
                                        </table>
                                        <div style="clear:both;"></div>
                                        <div id="accordionExample'.$id.'">
                                            <div class="collapse" id="moreInfo'.$id.'" data-parent="#accordionExample'.$id.'">
                                               <div class="card card-body">
                                                    <h3>Informacje</h3>
                                                    <b>Id:</b> '.$id.'<br />
                                                    <b>Nazwa:</b> '.$name.'<br />
                                                    <b>Autor:</b> '.$author.'<br />
                                                    <b>Cena:</b> '.$price.'<br />
                                                    <b>Miniatura:</b> '.$image.'<br />
                                                    <b>Wymiary:</b> '.$sizeX.'x'.$sizeY.$sizeUnit.' <br />
                                                   <b>Opis:</b> '.$description.'
                                                    
                                               </div>
                                            </div>
                                            <div class="collapse" id="edit'.$id.'" data-parent="#accordionExample'.$id.'">
                                               <div class="card card-body">
                                                 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                               </div>
                                            </div>
                                            <div class="collapse" id="delete'.$id.'" data-parent="#accordionExample'.$id.'">
                                               <div class="card card-body">
                                                   <label>Czy na pewno chcesz to usunąć ? <span class="btn btn-success">Nie</span><a href="../source.php?action=dropItem&id='.$id.'"><span class="btn btn-danger">Tak</span></a></label> 
                                               </div>
                                            </div>
                                        </div>
                                      </div>'

                                ;
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="v-pills-events" role="tabpanel" aria-labelledby="v-pills-events-tab">...</div>
                        <div class="tab-pane fade" id="v-pill-gadgeds" role="tabpanel" aria-labelledby="v-pill-gadgeds-tab">sadsaasdas</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
