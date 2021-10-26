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
        <title>Yazı Ekle</title>
    </head>
    <body>

        <center>
            <form action="" method="POST">
                <table border=1>
                    <tr>
                        <td><span>Başlık</span></td>
                        <td><input type="text" name="title"></td>
                    </tr>
                    <tr>
                        <td><span>İçerik</span></td>
                        <td><textarea name="content" id="content" cols="20" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td>İkon numarası(Tercih)</td>
                        <td><input type="number" name="icon_id"></td>
                    </tr>
                    <tr>
                        <td>Yazı Türü</td>
                        <td><select name="text_type" id="text_type" required>
                            <option value="" selected></option>
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
                        <td colspan=2><input type="submit" value="Ekle"></td>
                    </tr>
                    
                
                </table>
            </form>
        </center>

    </body>
</html>

<?php
}else{
    $text_type = $_POST['text_type'];
    $icon_id = $_POST['icon_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    if($icon_id){
    $sql = "INSERT INTO texts (type_id, icon_id, title, content) VALUES ('$text_type', '$icon_id', '$title', '$content')";
    $result = $DBconn->query($sql);
    }else{
        $sql = "INSERT INTO texts (type_id, title, content) VALUES ('$text_type', '$title', '$content')";
        $result = $DBconn->query($sql);
    }
    
    if($result === TRUE){
        echo("Ekleme başarılı");
        header("Refresh:3; url=../admin_panel/admin_panel.php");
    }
    else{
        echo("HATA");
        header("Refresh:3; url=addText.php");
    }
}
?>