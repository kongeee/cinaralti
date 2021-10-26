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
        <title>Ürün Güncelle</title>
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
}elseif(isset($_POST['category_id']) && !isset($_POST['product_id'])){
?>
<!-- Sonra silinmek istenen ürün seçiliyor -->
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Ürün Güncelle</title>
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
            <input type="hidden" name="category_id" value="<?php echo $category_id ?>">
            <input type="Submit" value="Güncelle">
        </form>

    </body>
</html>

<?php
}elseif(isset($_POST['category_id']) && isset($_POST['product_id']) && !isset($_POST['price'])){
?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Ürün Güncelle</title>
    </head>
    <body>


        <?php
            $product_id = $_POST['product_id'];
            $sql = "SELECT * FROM products WHERE product_id='$product_id'";
            $result = $DBconn->query($sql);
            $row = mysqli_fetch_assoc($result);
        ?>
        <center>
            <form action="" method="POST">
                <table border=1>
                    <tr>
                        <td><span>Ürün Adı</span></td>
                        <td><input type="text" name="product_name" value="<?php echo $row['product_name'] ?>"></td>
                    </tr>
                    <tr>
                        <td><span>Açıklama</span></td>
                        <td><textarea name="detail" id="detail" cols="20" rows="10"><?php echo $row['detail'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Fiyat</td>
                        <td><input type="number" name="price" step="0.01" value="<?php echo $row['price'] ?>"></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td><select name="category_id" id="category_id" required>
                        <?php
                            $category_id = $_POST['category_id'];
                            $sql = "SELECT * FROM categories WHERE category_id='$category_id' ";
                            $result = $DBconn->query($sql);
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <option value="<?php echo $row['category_id'] ?>" selected><?php echo $row['category_name'] ?></option>
                            <?php
                                $sql = "SELECT * FROM categories";
                                $result = $DBconn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>

                            <?php } ?>
                        </select></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="product_id" value="<?php echo $product_id ?>"></td>
                        <td><input type="submit" value="Güncelle"></td>
                    </tr>
                    
                
                </table>
            </form>
        </center>

    </body>
</html>

<?php
}else{

    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];

    
    $sql = "UPDATE products SET category_id='$category_id', product_name='$product_name', detail='$detail', price='$price' WHERE product_id='$product_id'";
    $result = $DBconn->query($sql);
    

    if($result === TRUE){
        echo "Düzenleme başarılı";
    }
    else{
        echo "HATA";
    }
    header("Refresh:3; url=../admin_panel/admin_panel.php");
    
}
?>