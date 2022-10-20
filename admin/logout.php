<?php
session_start();
// unset($_SESSION["id"]);
unset($_SESSION["username"]);
header("location:http://localhost/vms/admin/index.php");
?>