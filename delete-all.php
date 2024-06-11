<?php
session_start();
unset($_SESSION["datasiswa"]);
header("Location: index.php");
exit;
?>