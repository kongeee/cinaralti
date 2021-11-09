<?php
include_once("../admin_panel/sessionControl.php");
include_once("../server.php");
?>

<?php
$name = $_POST['name'];
$e_mail = $_POST['email'];
$message = $_POST['message'];
$ip = $_SERVER['REMOTE_ADDR'];
$message_status = "okunmadi";

$send_before = false;

$sql = "SELECT ip FROM messages WHERE ip = MD5('$ip')";
$result = $DBconn->query($sql);
$row = mysqli_fetch_assoc($result);
if(isset($row['ip'])){
    $send_before = true;
}


$sql = "INSERT INTO messages(message_status, name, e_mail, message, ip) VALUES('$message_status', '$name', '$e_mail', '$message', MD5('$ip'))";
if(!$send_before && $DBconn->query($sql) === TRUE){
    echo "Mesaj gönderildi";
    header("Refresh:3; url=../index.php");
}
else if($send_before){
    echo "Daha önce mesaj göndermişsiniz. Lütfen okunmasını bekleyin.";
    header("Refresh:3; url=../index.php");
}
else{
    echo "HATA";
    header("Refresh:3; url=../index.php");
}
?>