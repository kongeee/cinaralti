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
        <title>Menü Sil</title>
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
            <input type="Submit" value="Sil">
        </form>

    </body>
</html>
<?php
}else{
    $menu_id = $_POST['menu_id'];
    $sql = "DELETE FROM menus WHERE menu_id='$menu_id'";
    if($DBconn->query($sql) === TRUE){
        echo "Silindi";
        header("Refresh:3; url=../admin_panel/admin_panel.php");
    }
    else{
        echo "Silme Başarısız";
        header("Refresh:3; url=deleteMenu.php");
    }
}
?>