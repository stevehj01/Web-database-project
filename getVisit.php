      
<?php
 
$clinicNum = $_POST['clinicNum'];
 
$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CALL visitGETInfo('$clinicNum' )";
//$sql = "SELECT * FROM Visit WHERE clinicNum = '$clinicNum' ";
$result = mysqli_query($con, $sql);


?>
<html>
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Visit Results</title>
<link href="medicalStudyDB.css" rel="stylesheet" type="text/css" />


</head>
<body id ="background">
        <div id ="wrap"/> 
        <div id ="headerBox">
                <h1>TAS Medical Studies</h1>
            </div>
            <div class="drop">
                <div class="menuBackground">
                    <ul class="dropDownMenu">
                        
                        <li><a href="index.php">Load Database Information</a></li>
                        <li><a href="index.php">Query Database Information</a></li>

                    </ul>
                </div>
            </div>     
           


<div id = 'formLoc' >
<p>Visit Detail for Clinic Number: <?php echo $clinicNum;?></p>
<p>Select items surrounded in red to display additional detail.</p>
<form name="study" action="results.php"  id = "study" method="post">
	<table>
	<tr>
		<th style="width:100px">Date</th>
		<th style="width:100px">Visit ID</th>
		<th style="width:100px">Test Results ID</th>
		<th style="width:100px">Treatment ID</th>
		<th style="width:100px">Diagnosis ID</th>
	</tr>	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
			
			<td><input type="text"  value="<?php echo $result1["date1"];?>" style="width:100px"  name = "date1" ></td>
     		<td><input type="text"  value="<?php echo $result1["visitID"];?>"style="width:100px" name = "visitID" ></td>
     		<td style="background-color:red;"><input type="submit"  value="<?php echo $result1["testID"];?>" style="width:100px"  name = "testID" ></td>
     		<td style="background-color:red;"><input type="submit"  value="<?php echo $result1["treatID"];?>" style="width:100px"  name = "treatID" ></td>
       		<td style="background-color:red;"><input type="submit"  value="<?php echo $result1["diagID"];?>" style="width:100px"  name = "diagID" ></td>
       		            
  	</tr>
  	<?php
           }
           ?>
  </table>
</form>
</div>
</div>

<?php
mysqli_close($con);
?>
</body>
</html>
