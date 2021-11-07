<?php
include_once("sessionControl.php");
include_once("../server.php");
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Admin Paneli</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <table class="table">
                <tr>
                    <th>İşlem</th>
                    <th></th>
                </tr>
                <?php
                $sql = "SELECT COUNT(*) FROM messages WHERE message_status='okunmadi'";
                $result = $DBconn->query($sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <tr><td>Mesajlar<span class="badge">(<?php echo $row['COUNT(*)'] ?>)</span></td><td><a class="btn btn-primary" href="../contact_operations/showMessage.php">Git</a></td></tr>
                <tr><td>Resim Ekle</td><td><a class="btn btn-primary" href="../image_operations/addImage.php">Git</a></td></tr>
                <tr><td>Resim Göster</td><td><a class="btn btn-primary" href="../image_operations/showImages.php">Git</a></td></tr>
                <tr><td>Yazı Ekle</td><td><a class="btn btn-primary" href="../text_operations/addText.php">Git</a></td></tr>
                <tr><td>Yazı Düzenle</td><td><a class="btn btn-primary" href="../text_operations/editText.php">Git</a></td></tr>
                <tr><td>Yazı Sil</td><td><a class="btn btn-primary" href="../text_operations/deleteText.php">Git</a></td></tr>
                <tr><td>Kategori Ekle</td><td><a class="btn btn-primary" href="../category_operations/addCategory.php">Git</a></td></tr>
                <tr><td>Kategori Düzenle</td><td><a class="btn btn-primary" href="../category_operations/editCategory.php">Git</a></td></tr>
                <tr><td>Kategori Sil</td><td><a class="btn btn-primary" href="../category_operations/deleteCategory.php">Git</a></td></tr>
                <tr><td>Ürün Ekle</td><td><a class="btn btn-primary" href="../product_operations/addProduct.php">Git</a></td></tr>
                <tr><td>Ürün Düzünle</td><td><a class="btn btn-primary" href="../product_operations/editProduct.php">Git</a></td></tr>
                <tr><td>Ürün Sil</td><td><a class="btn btn-primary" href="../product_operations/deleteProduct.php">Git</a></td></tr>
                <tr><td>Menü Ekle</td><td><a class="btn btn-primary" href="../menu_operations/addMenu.php">Git</a></td></tr>
                <tr><td>Menüye Kategori Ekle</td><td><a class="btn btn-primary" href="../menu_operations/addCategoryToMenu.php">Git</a></td></tr>
                <tr><td>Menü Düzenle</td><td><a class="btn btn-primary" href="../menu_operations/editMenu.php">Git</a></td></tr>
                <tr><td>Menü Sil</td><td><a class="btn btn-primary" href="../menu_operations/deleteMenu.php">Git</a></td></tr>
                
                <tr><td>Güvenli Çıkış</td><td><a class="btn btn-danger" href="exit.php">Git</a></td></tr>


            </table>
        </div>

        
        
        
        
        
        
       
        
        
        
        
        
        

        <?php
        $sql = "SELECT COUNT(*) FROM messages WHERE message_status='okunmadi'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <a href="../contact_operations/showMessage.php"></a>
        <br>
        <a href="exit.php">Güvenli Çıkış</a>

    </body>
</html>