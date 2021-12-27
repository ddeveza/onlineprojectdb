<?php 

$con = mysqli_connect("localhost","root","","dmsg");
if(!$con){
	echo "Database connect error".mysqli_error($con);
}

