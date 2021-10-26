<?php 

session_start();
ob_start();


if(!isset($_SESSION["login"])){//Session control
    
    header('Location:../sessionError.html');
}

?>