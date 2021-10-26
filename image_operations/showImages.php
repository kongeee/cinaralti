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
        <title>Resimleri Göster</title>
    </head>
    <body>

        <form action="" method="POST">
            <select name="image_type" id="image_type">
            <option value="" selected>Seçiniz</option>
                <?php
                $sql = "SELECT * FROM image_types";
                $result = $DBconn->query($sql);
                while($row = mysqli_fetch_assoc($result)){

                ?>
                <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
                <?php } ?> 
            </select>
            <input type="submit" value="Göster">
        </form>

    </body>
</html>

<?php
}else{
    $type = $_POST['image_type'];
    $sql = "SELECT * FROM image_types INNER JOIN images WHERE images.type_id=image_types.type_id AND image_types.type_id='$type'";
    $result = $DBconn->query($sql);
    while($row = mysqli_fetch_assoc($result)){
        $path ="../assets/" .  $row['type_name'] . "/" . $row['image_name'];
        echo "<img src='{$path}' alt='' width=300 height=300>";
        echo "Numara : " . $row['image_id'];

        ?>
        
        <form action="deleteImages.php" method="POST">
            <input type="checkbox" name="control[]" value=" <?php echo $row['image_id'] ?>">
            
        

    <?php } ?>
    <input type="submit" value="Sil">
    </form>

    <?php
    
}
?>