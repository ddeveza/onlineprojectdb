<?php

	session_start();
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'dmsg');
	
	
	$connect =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
	$q = intval($_GET['q']);
    $sql = "SELECT Week_Number, Detailed_Status_Update
FROM weeklystatus WHERE Project_ID = '".$q."'";
	$result = mysqli_query($connect,$sql);

	



echo "<table> <tr>
<th>WW</th>
<th>project description</th>
</tr>";

while($row = mysqli_fetch_array($result)){
	$dennis =$row['Week_Number'];
	$dennis1 = $row['Detailed_Status_Update'];
	echo "<tr>";
    echo "<td >" . $dennis. "</td>";
    echo "<td >" . $dennis1 . "</td>";
	echo "</tr>";
}
echo "</table>";
?>