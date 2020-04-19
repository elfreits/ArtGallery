<?php
    require_once("confDB.php");
    $id = $_GET['id'];
    $conn = mysqli_connect($host, $userDB, $passwordDB);
    $conn->query("SET NAMES 'utf8'");
    mysqli_select_db($conn, $base);
    $query = mysqli_query($conn, "SELECT id, author, name, price, sizeX, sizeY, sizeUnit, image FROM items WHERE id = $id");
    while($row=mysqli_fetch_array($query)){
        $name = $row['name'];
        $price = $row['price'];
        $author = $row['author'];
        $image = $row['image'];
        $sizeX = $row['sizeX'];
        $sizeY = $row['sizeY'];
        $sizeUnit = $row['sizeUnit'];
    }
?>
<div class = "content-item">
    <?php
        echo '<img src="img/'.$image.'" class="image-item">';
    ?>
    <div id="info-box-item">
        <h1><?php echo $name; ?></h1>
        <h2><?php echo $author; ?></h2>
        <h3><?php echo $sizeX." x ".$sizeY.' ('.$sizeUnit.')'; ?></h3>
        <h2><?php echo $price."PLN"; ?></h2>
        <div id="add-button-item">Dodaj do koszyka </div>
    </div>
    <div style="clear:both"></div>

</div>