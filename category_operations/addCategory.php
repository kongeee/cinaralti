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
        <title>Kategori Ekle</title>
    </head>
    <body>

        <center>
            <form action="" method="POST">
                <table border=1>
                    <tr>
                        <td><span>Kategori Adı</span></td>
                        <td><input type="text" name="category_name"></td>
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
    $category_name = $_POST['category_name'];

    
    $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    $result = $DBconn->query($sql);
    
    
    if($result === TRUE){
        echo("Ekleme başarılı");
        header("Refresh:3; url=../admin_panel/admin_panel.php");
    }
    else{
        echo("HATA");
        header("Refresh:3; url=addCategory.php");
    }
}
?>