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
        <title>Resim Yükle</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <h2 style="color:red;">İkon eklerken .svg formatında eklenmelidir!!!</h2>
        <form class="form-inline" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input name="files[]" type="file" multiple="multiple">
            <select class="form-control" name="image_type" id="image_type" required>
                <option value="" selected>Seçiniz</option>
                <?php
                $sql = "SELECT * FROM image_types";
                $result = $DBconn->query($sql);
                while($row = mysqli_fetch_assoc($result)){

                ?>
                <option value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>
                <?php } ?> 
            </select>
        </div>
            <input class="btn btn-success" type="submit" value="Ekle">
    
        </form>
    </div>                
    </body>
</html>

<?php
}else{
    if(count($_FILES['files']['name'])>0){
        $type = $_POST['image_type'];
        $sql = "SELECT * FROM image_types WHERE type_id = $type";
        $result = $DBconn->query($sql);
        $row = mysqli_fetch_assoc($result);

        $path = $row['type_name'];
        $directory = "../assets" . "/{$path}";
        $numberOfFiles = count($_FILES['files']['name']);
        for($i=0 ; $i<$numberOfFiles ; $i++){
            $imageName = $_FILES['files']['name'][$i];
            $fullPath = __DIR__ . "/" . $directory . "/" . $imageName;
            $result = move_uploaded_file($_FILES['files']['tmp_name'][$i], $fullPath);

            $sql = "INSERT INTO images(type_id, image_name, image_path) VALUES ('$type', '$imageName', '$fullPath')";
            $result = $DBconn->query($sql);
            if($result === TRUE){
                echo($imageName . " başarı ile yüklendi<br>");
                
            }
            else{
                sleep(10);
                for($i=0 ; $i<$numberOfFiles ; $i++){
                    unlink(__DIR__ . "/" . $directory . "/" . $_FILES['files']['name'][$i]);
                }
                echo("Bir problem oluştu. Tekrar Deneyin");
                header("Refresh:3; url=addImage.php");
            }
            header("Refresh:3; url=../admin_panel/admin_panel.php");
        }
    }
}
?>