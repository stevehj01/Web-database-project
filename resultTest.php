<?php
 
$testID = $_POST['testID'];
if (empty($testID)) $testID = '%';

$visitID = $_POST['visitID'];
if (empty($visitID)) $visitID = '%';

$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if($testID == '%'){
$sql = "SELECT * FROM TestResults WHERE visitID = '$visitID' ";}
else{
$sql = "SELECT * FROM TestResults WHERE testID = '$testID' ";}
$result = mysqli_query($con, $sql);


?>
<html>
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Assist Results</title>
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
		
		<th>Test ID</hd>
		<th>Visit ID</hd>
		<th>Estimated Processing Completion Date</hd>
		<th>Estimated Analysis Completion Date</hd>
		<th>Test File Name</hd>
		
	
	</tr>	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
		
     		<td> <input type="text" value="<?php echo $result1["testID"];?>"size =20></td>
     		<td><input type="text" value="<?php echo $result1["visitID"];?>"size =30></td>
     		<td> <input type="text" value="<?php echo $result1["dataProcessingComplete"];?>"size =20></td>
     		<td><input type="text" value="<?php echo $result1["dataAnalysisComplete"];?>"size =30></td>
     		<td> <input type="text" value="<?php echo $result1["file1"];?>"size =20></td>
     		  			      
            
            
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