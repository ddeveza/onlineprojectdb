<?php 

//Receive Package - Development_Start_Date
//Bin1 Completed  - PRP_Date
//Qual Completed - Qualification_Start_Date
//Cab Approved - CAB_Approved_Date
//ECO Release  - ECO_Released

include ('../../config/config.php');

$data = json_decode(file_get_contents("php://input"), TRUE);
$id = $data['id'];
$rpDates = $data['dates']['rpDate']['completedDate'];
$bin1Date = $data['dates']['bin1Date']['completedDate'];
$qualDate = $data['dates']['qualDate']['completedDate'];
$cabDate = $data['dates']['cabDate']['completedDate'];
$ecoDate = $data['dates']['ecoDate']['completedDate'];

$update ="UPDATE projects 
    SET 
     Development_Start_Date='$rpDates',
     PRP_Date= '$bin1Date', 
     Qualification_Start_Date='$qualDate',
     CAB_Approved_Date='$cabDate', 
     ECO_Released = '$ecoDate'

     WHERE Project_ID='$id'";

$result= mysqli_query($con,$update);

if ($result) echo "Successfully save the dates" ;
else echo "There is an error in saving the dates";

?>