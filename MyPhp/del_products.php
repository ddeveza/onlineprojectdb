<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();

$ID=$_POST['ID'];

$delete = "DELETE FROM Products Where ID='$ID';";
$result = mysqli_query($con,$delete);