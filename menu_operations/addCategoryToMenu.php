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
        $sql = "SELECT * FROM categories INNER JOIN menus INNER JOIN menu_details WHERE categories.category_id=menu_details.category_id AND  menu_details.menu_id='$menu_id'";
        $result = $DBconn->query($sql);
        $categoryIdArray = array();
        while($row = mysqli_fetch_assoc($result)){ 
            array_push($categoryIdArray, $row['category_id']);
        }
        print_r($categoryIdArray);
        ?>
        
        <input type="Submit" value="Düzenle">
    </form>
        

    </body>
</html>

<?php
}else{
    $menu_name = $_POST['menu_name'];

    
    $sql = "INSERT INTO menu_details (menu_name) VALUES ('$menu_name')";
    $result = $DBconn->query($sql);
    
    
    if($result === TRUE){
        echo("Ekleme başarılı");
        header("Refresh:3; url=../admin_panel/admin_panel.php");
    }
    else{
        echo("HATA");
        header("Refresh:3; url=addMenu.php");
    }
}
?>