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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
        <form class="form-inline" action="" method="POST">
            <select class="form-control" name="image_type" id="image_type">
            <option value="" selected>Seçiniz</option>
                <?php
                $sql = "SELECT * FROM image_types";
                $result = $DBconn->query($sql);
                while($row = mysqli_fetch_assoc($result)){

                ?>
                <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
                <?php } ?> 
            </select>
            <input class="btn btn-success" type="submit" value="Göster">
        </form>
        </div>                
    </body>
</html>

<?php
}else{
    ?>
    <div class='container-fluid'> 
    <form action="deleteImages.php" method="POST"> 
    <?php
    $type = $_POST['image_type'];
    $sql = "SELECT * FROM image_types INNER JOIN images WHERE images.type_id=image_types.type_id AND image_types.type_id='$type'";
    $result = $DBconn->query($sql);
    echo "<div class='row'>";
    while($row = mysqli_fetch_assoc($result)){
        $path ="../assets/" .  $row['type_name'] . "/" . $row['image_name'];
        
        echo "<div style='display:inline-block' class='col-xs-4'>";
        echo "<img src='{$path}' alt='' width=200 height=200>";
        echo "<span>Numara : " . $row['image_id'] . "</span>";

        ?>
        
        
            <input class="form-control" type="checkbox" name="control[]" value=" <?php echo $row['image_id'] ?>">
            
    
        </div>
    <?php } ?>
    <br>
    <input class="col-md-12" type="submit" value="Sil">
    </form>
    
    </div>
    </div>
    <?php
    
}
?>