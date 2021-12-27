
<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h2>The XMLHttpRequest Object</h2>


<script>
function showWW(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("testing").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("testing").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../Action/WorkWeek.php?q="+str, true);
  xhttp.send();
}
</script>