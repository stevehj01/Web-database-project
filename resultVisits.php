      
<?php
 
$visitID = $_POST['visitID'];

$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Visit WHERE visitID = '$visitID' ";
$result = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Visit Results</title>
<link href="medicalStudyDB.css" rel="stylesheet" type="text/css" />
</head>
<body id ="background">
        <div id ="wrap"> 
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
<form>
	<table>
	<tr>
		
		<th>Visit ID</th>
		<th>Date</th>
		<th>Clinic Number</th>
		<th>Primary Provider ID</th>
		<th>ICD9 Number</th>
		
		
	</tr>	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
		
     		<td> <input type="text" value="<?php echo $result1["visitID"];?>"size =10></td>
     		<td><input type="text" value="<?php echo $result1["date1"];?>"size =10></td>
  			<td> <input type="text" value="<?php echo $result1["clinicNum"];?>"size =20></td>
     		<td><input type="text" value="<?php echo $result1["providerIDPrim"];?>"size =26></td>
  			<td><input type="text" value="<?php echo $result1["ICDNumPrim"];?>"size =10></td>

      
            
            
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
</div>
</body>
</html>