      
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
<form>
	<table>
	<tr>
		
		<th>Visit ID</hd>
		<th>Date</hd>
		<th>Clinic Number</hd>
		<th>Primary Provider ID</hd>
		<th>ICD9 Number</hd>
		
		
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
</body>
</html>