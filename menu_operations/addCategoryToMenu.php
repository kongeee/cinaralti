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
        <title>Menüye Kategori Ekle</title>
    </head>
    <body>

    <form action="" method="POST">
        <select required name="menu_id" id="menu_id">
            <option value="" selected></option>
            <?php

            $sql = "SELECT * FROM menus";
            $result = $DBconn->query($sql);
            while($row = mysqli_fetch_assoc($result)){
                $menu_id = $row['menu_id'];
                $menu_name = $row['menu_name'];
                echo "<option value='$menu_id'>$menu_name</option>";
            }

            ?>
        </select>
        <input type="Submit" value="Devam">
    </form>
        

    </body>
</html>

<?php
}elseif(isset($_POST['menu_id'])){
?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Menüye Kategori Ekle</title>
    </head>
    <body>

    
    <form action="" method="POST">
        <?php
        $menu_id = $_POST['menu_id'];
        $sql = "SELECT * FROM categories INNER JOIN menu_details WHERE categories.category_id=menu_details.category_id AND  menu_details.menu_id='$menu_id'";
        $result = $DBconn->query($sql);
        $categoryIdArray = array();
        while($row = mysqli_fetch_assoc($result)){ 
            array_push($categoryIdArray, $row['category_id']);
        }
        
        $sql2 = "SELECT * FROM categories";
        $result2 = $DBconn->query($sql2);
        while($row2 = mysqli_fetch_assoc($result2)){
            $category_id = $row2['category_id'];
            $category_name = $row2['category_name'];
            if(in_array($row2['category_id'], $categoryIdArray)){
                echo "<input type='checkbox' checked name='$category_id'>$category_name";
            }else{
                echo "<input type='checkbox' name='$category_id'>$category_name";
            }
        }
        ?>
        <input type="hidden" name="menu" value="<?php echo $menu_id ?>">
        <input type="Submit" value="Düzenle">
    </form>
        

    </body>
</html>

<?php
}else{
    $menu_id = $_POST['menu'];
    $newCategories = array_keys($_POST);
    array_pop($newCategories);

    //menu_detailsten bu menuyu sil sonra seçilenlere göre hepsini baştan ekle
    $sql = "DELETE FROM menu_details WHERE menu_id = '$menu_id'";
    if($DBconn->query($sql) === TRUE){
        foreach($newCategories as $category_id){
            $sql = "INSERT INTO menu_details(menu_id, category_id) VALUES ('$menu_id', '$category_id')";
            $DBconn->query($sql);
        }
        echo "Düzenleme başarılı";
    }
    else{
        echo "HATA";
    }

    header("Refresh:3; url=../admin_panel/admin_panel.php");
    
}
?>