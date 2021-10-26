<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>

<?php
if(!$_POST){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Yazı Sil</title>
    </head>
    <body>

        <form action="" method="POST">
            <select required name="text_id" id="text_id">
                <option value="" selected></option>
                <?php

                $sql = "SELECT * FROM texts";
                $result = $DBconn->query($sql);
                while($row = mysqli_fetch_assoc($result)){
                    $text_id = $row['text_id'];
                    $title = $row['title'];
                    echo "<option value='$text_id'>$title</option>";
                }

                ?>
            </select>
            <input type="Submit" value="Sil">
        </form>

    </body>
</html>
<?php
}else{
    $text_id = $_POST['text_id'];
    $sql = "DELETE FROM texts WHERE text_id='$text_id'";
    if($DBconn->query($sql) === TRUE){
        echo "Silindi";
        header("Refresh:3; url=../admin_panel/admin_panel.php");
    }
    else{
        echo "Silme Başarısız";
        header("Refresh:3; url=deleteText.php");
    }
}
?>