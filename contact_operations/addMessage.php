<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>

<?php
$name = $_POST['name'];
$e_mail = $_POST['email'];
$message = $_POST['message'];
$message_status = "okunmadi";

$sql = "INSERT INTO messages(message_status, name, e_mail, message) VALUES('$message_status', '$name', '$e_mail', '$message')";
if($DBconn->query($sql) === TRUE){
    echo "Mesaj gönderildi";
    header("Refresh:3; url=../index.php");
}
else{
    echo "HATA";
    header("Refresh:3; url=../index.php");
}
?>