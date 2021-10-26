<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Resim Sil</title>
    </head>
    <body>

        <?php

            

        foreach($_POST['control'] as $image_id){
            $sql = "SELECT * FROM image_types INNER JOIN images WHERE images.type_id=image_types.type_id AND images.image_id='$image_id'";
            $result = $DBconn->query($sql);
            $row = mysqli_fetch_assoc($result);

            $path = __DIR__ . "/" . "../assets" . "/" .  $row['type_name'] . "/" . $row['image_name'];
            
            $fileResult = unlink($path);

            $sql = "DELETE FROM images WHERE image_id = '$image_id'";
            $dbResult = $DBconn->query($sql);

            if($fileResult && $dbResult){
                echo("Silme başarılı");
                header("Refresh:3; url=../admin_panel/admin_panel.php");
            }
            else{
                echo("HATA");
                header("Refresh:3; url=showImages.php");
            }

        }

        ?>

    </body>
</html>