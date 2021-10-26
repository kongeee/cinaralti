<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>

<?php
if(!$_POST){
?>

<!-- Önce kategori seçiliyor -->
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Ürün Sil</title>
    </head>
    <body>

        <form action="" method="POST">
            <select required name="category_id" id="category_id">
                <option value="" selected></option>
                <?php

                $sql = "SELECT * FROM categories";
                $result = $DBconn->query($sql);
                while($row = mysqli_fetch_assoc($result)){
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    echo "<option value='$category_id'>$category_name</option>";
                }

                ?>
            </select>
            <input type="Submit" value="Devam">
        </form>

    </body>
</html>
<?php
}elseif(isset($_POST['category_id'])){
?>
<!-- Sonra silinmek istenen ürün seçiliyor -->
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Ürün Sil</title>
    </head>
    <body>

        <form action="" method="POST">
            <select required name="product_id" id="product_id">
                <option value="" selected></option>
                <?php
                $category_id = $_POST['category_id'];
                $sql = "SELECT * FROM products WHERE category_id='$category_id'";
                $result = $DBconn->query($sql);
                while($row = mysqli_fetch_assoc($result)){
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    echo "<option value='$product_id'>$product_name</option>";
                }

                ?>
            </select>
            <input type="Submit" value="Sil">
        </form>

    </body>
</html>

<?php
}else{

    
    $product_id = $_POST['product_id'];
    $sql = "DELETE FROM products WHERE product_id='$product_id'";
    if($DBconn->query($sql) === TRUE){
        echo "Silindi";
        header("Refresh:3; url=../admin_panel/admin_panel.php");
    }
    else{
        echo "Silme Başarısız";
        header("Refresh:3; url=deleteProduct.php");
    }
    
}
?>