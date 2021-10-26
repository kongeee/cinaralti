<?php
include_once("sessionControl.php");
include_once("../server.php");
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Admin Paneli</title>
    </head>
    <body>

        <a href="../image_operations/addImage.php">Resim Ekle</a>
        <br>
        <a href="../image_operations/showImages.php">Resimleri Göster</a>
        <br>
        <a href="../text_operations/addText.php">Yazı Ekle</a>
        <br>
        <a href="../text_operations/editText.php">Yazı Düzenle</a>
        <br>
        <a href="../text_operations/deleteText.php">Yazı Sil</a>
        <br>
        <a href="../category_operations/addCategory.php">Kategori Ekle</a>
        <br>
        <a href="../category_operations/editCategory.php">Kategori Düzenle</a>
        <br>
        <a href="../category_operations/deleteCategory.php">Kategori Sil</a>
        <br>
        <a href="../product_operations/addProduct.php">Ürün Ekle</a>
        <br>
        <a href="../product_operations/editProduct.php">Ürün Düzünle</a>
        <br>
        <a href="../product_operations/deleteProduct.php">Ürün Sil</a>
        <br>
        <a href="../menu_operations/addMenu.php">Menü Ekle</a>
        <br>
        <a href="../menu_operations/addCategoryToMenu.php">Menüye Kategori Ekle</a>
        <br>
        <a href="../menu_operations/editMenu.php">Menü Düzenle</a>
        <br>
        <a href="../menu_operations/deleteMenu.php">Menü Sil</a>
        <br>

        <?php
        $sql = "SELECT COUNT(*) FROM messages WHERE message_status='okunmadi'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <a href="../contact_operations/showMessage.php">Mesajlar(<?php echo $row['COUNT(*)'] ?>)</a>
        <br>
        <a href="exit.php">Güvenli Çıkış</a>

    </body>
</html>