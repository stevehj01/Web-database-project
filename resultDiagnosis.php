      
<?php
 
$diagID = $_POST['diagID'];
if (empty($diagID)) $diagID = '%';

$diagDesc = $_POST['diagDesc'];
if (empty($diagDesc)) $diagDesc = '%';
$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if($diagID == '%'){
$sql = "SELECT * FROM Diagnosis WHERE description = '$diagDesc' ";}
else{
$sql = "SELECT * FROM Diagnosis WHERE diagID = '$diagID' ";}
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
		
		<th>Diagnosis ID</hd>
		<th>Description</hd>
				
	</tr>	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
		
     		<td> <input type="text" value="<?php echo $result1["diagID"];?>"size =20></td>
     		<td><input type="text" value="<?php echo $result1["description"];?>"size =30></td>
  			      
            
            
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