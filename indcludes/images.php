<?php
    require_once("confDB.php");

?>
   

   <div id="container">
        <?php
            $conn = mysqli_connect('localhost', 'root', '');
            $conn->query("SET NAMES 'utf8'");
            mysqli_select_db($conn,'gallery');
            $query = mysqli_query($conn, "SELECT id, author, name, price, sizeX, sizeY, sizeUnit, image FROM items WHERE type = 1");
                while($row = mysqli_fetch_array($query)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $price= $row['price'];
                    $author = $row['author'];
                    $sizeX = $row['sizeX'];
                    $sizeY = $row['sizeY'];
                    $sizeUnit = $row['sizeUnit'];
                    $image = $row['image'];
                    echo '<div class="item-box-shop">';
                    echo '<img src="img/'.$image.'" class="item-image-shop">';
                    echo '<h2>'.$name.'</h2>';
                    echo '<h3>'.$author.'</h3>';
                    echo '<h4>'. $sizeX.' '.$sizeUnit.' x '.$sizeY.' '.$sizeUnit.'</h4>';
                    echo '<div class="price-shop">'.$price.' PLN</div>';
                    echo '</div>';
                }
            mysqli_close($conn);
        ?>
    <div style="clear:both;"></div>
</div>
