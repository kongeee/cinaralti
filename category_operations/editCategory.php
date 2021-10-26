<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>

<?php
if(!isset($_POST['category_id']) && !isset($_POST['category_name'])){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Kategori Düzenle</title>
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
        <input type="Submit" value="Düzenle">
    </form>
        

    </body>
</html>

<?php
}elseif(!isset($_POST['category_name'])){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Kategori Düzenle</title>
    </head>
    <body>

        <?php
        $category_id = $_POST['category_id'];
        $sql = "SELECT * FROM categories WHERE category_id='$category_id'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <center>
            <form action="" method="POST">
                <table border=1>
                    <tr>
                        <td><span>Kategori Adı</span></td>
                        <td><input type="text" name="category_name" value="<?php echo $row['category_name'] ?>"></td>
                    </tr>
                    
                    <tr>
                        <td><input type="hidden" name="category_id" value="<?php echo $category_id ?>"></td>
                        <td><input type="submit" value="Düzenle"></td>
                    </tr>
                    
                
                </table>
            </form>
        </center>
        

    </body>
</html>




<?php
}else{
    $category_name = $_POST['category_name'];
    $category_id = $_POST['category_id'];

    
    $sql = "UPDATE categories SET category_name='$category_name' WHERE category_id='$category_id'";
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