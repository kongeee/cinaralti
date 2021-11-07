<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>

<?php
if(!$_GET){
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Mesajlar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
        <table class="table">
            <tr>
                <th>İsim</th>
                <th>E-posta</th>
                <th>Mesaj</th>
                <th>Durum</th>
                <th></th>
            </tr>
            
            <?php
            $sql = "SELECT * FROM messages ORDER BY message_status DESC";
            $result = $DBconn->query($sql);
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['e_mail'] ?></td>
                <td><?php echo $row['message'] ?></td>
                <td><?php echo $row['message_status'] ?></td>
                <?php if($row['message_status'] == "okunmadi"){ ?>
                <td><a class="btn btn-success" href="./showMessage.php?message_id=<?php echo $row['message_id'] ?>">Okundu olarak işaretle</a></td>
                <?php
                }else{
                    echo "<td></td>";
                }
                ?>
            </tr>
            <?php } ?>
        </table>
    </div>
    </body>
</html>
<?php
}else{
    $message_id = $_GET['message_id'];
    $sql = "UPDATE messages SET message_status='okundu' WHERE message_id='$message_id'";
    $DBconn->query($sql);
    header("Location:./showMessage.php");
}
?>