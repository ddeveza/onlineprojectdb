<?php
	require('../dmsg/inc/header.php');
?>
<style>
#container {
	bakground-color:#EE4;
	margin-left: auto;
	margin-right:auto;
	
}
#nav {
	width: 180px;
	float: left;
	
}
#mainsection {
	width :1000px;
	float : left;
	border : true;
	
}
#footer{
	clear: both;
}
ul {
	 cursor: pointer;
}
</style>
<div id="container">
	<div id="nav">
		<h3>Reports</h3>
		<ul>
			<li>Weekly Status Report</li>
			<li>Sir Manny Report</li>
			<li id='markreport'>Mark Gianelle Report</li>
		</ul>
		
	</div>
	<div id="mainsection">
		<h3>Reports</h3>
	</div> 
</div>

<?php
	include'..\dmsg/inc/footer.php'; 
?>

<script>
$('#container').on('click','#markreport',function(){
	alert('dennis');
	$('#mainsection').load('../dmsg/reports.php');
});

</script>

