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
        <title>Kategori Sil</title>
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
            <input type="Submit" value="Sil">
        </form>

    </body>
</html>
<?php
}else{
    $category_id = $_POST['category_id'];
    $sql = "DELETE FROM categories WHERE category_id='$category_id'";
    if($DBconn->query($sql) === TRUE){
        echo "Silindi";
        header("Refresh:3; url=../admin_panel/admin_panel.php");
    }
    else{
        echo "Silme Başarısız";
        header("Refresh:3; url=deleteCategory.php");
    }
}
?>