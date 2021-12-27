<?php 

include ('../../config/config.php');

$data = json_decode(file_get_contents("php://input"), TRUE);
$id = $data['id'];
/* $id = '107'; */
//Receive Package - Development_Start_Date
//Bin1 Completed  - PRP_Date
//Qual Completed - Qualification_Start_Date
//Cab Approved - CAB_Approved_Date
//ECO Release  - ECO_Released


$fetch = "SELECT * FROM projects WHERE Project_ID=$id";
$result = mysqli_query($con,$fetch);

if(mysqli_num_rows($result)>0){
	$row =mysqli_fetch_array($result);

    $rpDate = $row['TestItemReceived_Date'] != "" ? $row['TestItemReceived_Date'] : null;
    $bin1Date = $row['Bin1_Date'] != "" ? $row['Bin1_Date'] : null; 
    $qualDate = $row['QualCompletion_Date'] != "" ? $row['QualCompletion_Date'] : null;
    $cabDate = $row['CAB_Approved_Date']  != "0000-00-00" ? $row['CAB_Approved_Date']  : null;
    $ecoSubmittedDate = $row['ECO_Submitted']  != "0000-00-00" ? $row['ECO_Submitted']  : null;
    $ecoReleaseDate = $row['ECO_Released']  != "0000-00-00" ? $row['ECO_Released']  : null;
	
    if($row){
        $data = array(
            'rpDate'=>$rpDate ,
            'bin1Date'=>$bin1Date ,
            'qualDate'=>$qualDate ,
            'cabDate'=>$cabDate ,
            'ecoSubmittedDate'=>$ecoSubmittedDate,
            'ecoReleasedDate'=>$ecoReleaseDate
        );

        echo json_encode($data);
    }else {
        echo 'Null';
    }
   
	

}else {
    echo 'Error';
}


?>