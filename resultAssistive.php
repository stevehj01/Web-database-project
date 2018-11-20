<?php
 
$assistID = $_POST['assistID'];
if (empty($assistID)) $assistID = '%';

$assistDesc = $_POST['assistDesc'];
if (empty($assistDesc)) $assistDesc = '%';
$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if($assistID == '%'){
$sql = "SELECT * FROM AssistiveDevice WHERE description = '$assistDesc' ";}
else{
$sql = "SELECT * FROM AssistiveDevice WHERE assistID = '$assistID' ";}
$result = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Assist Results</title>
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
		
		<th>Assistive Device ID</hd>
		<th>Description</hd>
	
	</tr>	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
		
     		<td> <input type="text" value="<?php echo $result1["assistID"];?>"size =20></td>
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
</div>
</body>
</html>