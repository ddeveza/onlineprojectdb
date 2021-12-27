<?php

include 'D:\xampp\htdocs\dmsg\config\config.php';
session_start();

$UniqueID =$_POST['unique'];



$delete = "DELETE FROM Projects Where Project_ID='$UniqueID';";

$result = mysqli_query($con,$delete);
