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
        <title>Ürün Ekle</title>
    </head>
    <body>

        <center>
            <form action="" method="POST">
                <table border=1>
                    <tr>
                        <td><span>Ürün Adı</span></td>
                        <td><input type="text" name="product_name"></td>
                    </tr>
                    <tr>
                        <td><span>Açıklama</span></td>
                        <td><textarea name="detail" id="detail" cols="20" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td>Fiyat</td>
                        <td><input type="number" name="price" step="0.01"></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td><select name="category_id" id="category_id" required>
                            <option value="" selected></option>
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
                        <td colspan=2><input type="submit" value="Ekle"></td>
                    </tr>
                    
                
                </table>
            </form>
        </center>

    </body>
</html>

<?php
}else{
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];

    
    $sql = "INSERT INTO products (category_id, product_name, detail, price) VALUES ('$category_id', '$product_name', '$detail', '$price')";
    $result = $DBconn->query($sql);
    
    
    if($result === TRUE){
        echo("Ekleme başarılı");
        header("Refresh:3; url=../admin_panel/admin_panel.php");
    }
    else{
        echo("HATA");
        header("Refresh:3; url=addProduct.php");
    }
}
?>