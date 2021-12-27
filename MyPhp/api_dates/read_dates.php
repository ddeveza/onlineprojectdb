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

    $rpDate = $row['Development_Start_Date'] != "0000-00-00" ? $row['Development_Start_Date'] : null;
    $bin1Date = $row['PRP_Date'] != "0000-00-00" ? $row['PRP_Date'] : null;
    $qualDate = $row['Qualification_Start_Date'] != "0000-00-00" ? $row['Qualification_Start_Date'] : null;
    $cabDate = $row['CAB_Approved_Date']  != "0000-00-00" ? $row['CAB_Approved_Date']  : null;
    $ecoDate = $row['ECO_Released']  != "0000-00-00" ? $row['ECO_Released']  : null;
	
    if($row){
        $data = array(
            'rpDate'=>$rpDate ,
            'bin1Date'=>$bin1Date ,
            'qualDate'=>$qualDate ,
            'cabDate'=>$cabDate ,
            'ecoDate'=>$ecoDate

        );

        echo json_encode($data);
    }else {
        echo 'Null';
    }
   
	

}else {
    echo 'Error';
}


?>