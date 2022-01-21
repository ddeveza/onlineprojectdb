<?php
	require('inc/header-home.php');
	
?>









<style>
.btn {
    border: none;
    display: inline-block;
    padding: 8px 16px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    background-color: inherit;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
}

.topnav {
    position: relative;
    z-index: 10;
    font-size: 20px;
    background-color: #5f5f5f;
    color: #f1f1f1;
    width: 100%;
    padding: 5px;
    letter-spacing: 2px;
    font-family: "Segoe UI", Arial, sans-serif;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    cursor: pointer;
}

td,
th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 1px;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

.top {
    background-color: #666;
    padding: 10px;
    text-align: center;
    font-size: 20px;
    color: white;
    text-align: center;
    margin-block-start: 0em;
    margin-block-end: 0em;
}

.subhead {
    background-color: #A9A9A9;
    padding: 10px;
    text-align: center;
    font-size: 20px;
    color: white;

    margin-block-start: 0em;
    margin-block-end: 0em;
    margin-top: 0;
    margin-bottom: 0;
}

th {
    padding: 10px 18px;
    float: left;
    width: auto;
    border: none;
    display: block;
    outline: 1;

}
</style>






<div id="DMSG-header">
    <table>
        <tr class="topnav">
            <th id="report" class="btn">Weekly Status Report</th>
            <th id="AddProjects" class="btn">Add/Update Projects</th>
            <th id="AddProducts" class="btn">Add/Update Products</th>
            <th id="HWDB" class="btn">HW DB</th>
            <th id="KPI" class="btn">KPI Chart</th>
            <th id="Viewer" class="btn">Projects Viewer</th>
            <th class="btn" id="logoutbutton">Logout</th>
        </tr>
    </table>
</div>

</body>

</html>