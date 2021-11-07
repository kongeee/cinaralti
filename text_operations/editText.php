<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>

<?php
if(!isset($_POST['text_id']) && !isset($_POST['content'])){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Yazı Düzenle</title>
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
        <input type="Submit" value="Düzenle">
    </form>
        

    </body>
</html>

<?php
}elseif(!isset($_POST['content'])){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Yazı Düzenle</title>
    </head>
    <body>

        <?php
        $text_id = $_POST['text_id'];
        $sql = "SELECT * FROM texts INNER JOIN text_types WHERE text_types.type_id=texts.type_id AND text_id='$text_id'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <center>
            <form action="" method="POST">
                <table border=1>
                    <tr>
                        <td><span>Başlık</span></td>
                        <td><input type="text" name="title" value="<?php echo $row['title'] ?>"></td>
                    </tr>
                    <tr>
                        <td><span>İçerik</span></td>
                        <td><textarea name="content" id="content" cols="20" rows="10"><?php echo $row['content'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>İkon numarası(Tercih)</td>
                        <td><input type="number" name="icon_id" value="<?php echo $row['icon_id'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Yazı Türü</td>
                        <td><select name="text_type" id="text_type" required>
                            <option value="<?php echo $row['type_id'] ?>" selected><?php echo $row['type_name'] ?></option>
                            <?php
                                $sql = "SELECT * FROM text_types";
                                $result = $DBconn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>

                            <?php } ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="text_id" value="<?php echo $text_id ?>"></td>
                        <td><input type="submit" value="Düzenle"></td>
                    </tr>
                    
                
                </table>
            </form>
        </center>
        

    </body>
</html>




<?php
}else{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $type_id =  $_POST['text_type'];
    $icon_id = $_POST['icon_id'];
    $text_id = $_POST['text_id'];

    $title = str_replace("'","\'",$title);
    $content = str_replace("'","\'",$content);

    if($icon_id){
    $sql = "UPDATE texts SET title='$title', content='$content', type_id='$type_id', icon_id='$icon_id' WHERE text_id='$text_id'";
    $result = $DBconn->query($sql);
    }else{
        $sql = "UPDATE texts SET title='$title', content='$content', type_id='$type_id', icon_id=NULL WHERE text_id='$text_id'";
        $result = $DBconn->query($sql);
    }

    if($result === TRUE){
        echo "Düzenleme başarılı";
    }
    else{
        echo "HATA";
    }
    header("Refresh:3; url=../admin_panel/admin_panel.php");
}
?>