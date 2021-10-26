<?php

session_start();

ob_start();
session_destroy();
echo "<center>ÇIKIŞ YAPILIYOR LÜTFEN BEKLEYİN</center>";

header("Refresh: 3; url=login.php");
ob_end_flush();
?>