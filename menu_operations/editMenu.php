<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>

<?php
if(!isset($_POST['menu_id']) && !isset($_POST['menu_name'])){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Menü Düzenle</title>
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
        <input type="Submit" value="Düzenle">
    </form>
        

    </body>
</html>

<?php
}elseif(!isset($_POST['menu_name'])){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Menü Düzenle</title>
    </head>
    <body>

        <?php
        $menu_id = $_POST['menu_id'];
        $sql = "SELECT * FROM menus WHERE menu_id='$menu_id'";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <center>
            <form action="" method="POST">
                <table border=1>
                    <tr>
                        <td><span>Menü Adı</span></td>
                        <td><input type="text" name="menu_name" value="<?php echo $row['menu_name'] ?>"></td>
                    </tr>
                    
                    <tr>
                        <td><input type="hidden" name="menu_id" value="<?php echo $menu_id ?>"></td>
                        <td><input type="submit" value="Düzenle"></td>
                    </tr>
                    
                
                </table>
            </form>
        </center>
        

    </body>
</html>




<?php
}else{
    $menu_name = $_POST['menu_name'];
    $menu_id = $_POST['menu_id'];

    
    $sql = "UPDATE menus SET menu_name='$menu_name' WHERE menu_id='$menu_id'";
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