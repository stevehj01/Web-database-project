<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Visit Results</title>
<link href="medicalStudyDB.css" rel="stylesheet" type="text/css" />
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>

<?php
//$q = intval($_GET['q']);
$clinicNum = ($_GET['clinicNum']);

$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

$sql="SELECT * FROM Visit WHERE clinicNum = '$clinicNum' ";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Visit ID</th>
<th>Clinic Number</th>
<th>Date</th>
<th>Study ID</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['visitID'] . "</td>";
    echo "<td>" . $row['clinicNum'] . "</td>";
    echo "<td>" . $row['date1'] . "</td>";
    echo "<td>" . $row['studyID'] . "</td>";
  
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>