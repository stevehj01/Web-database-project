      
<?php
 
$treatID = $_POST['treatID'];
if (empty($treatID)) $treatID = '%';

$treatDesc = $_POST['treatDesc'];
if (empty($treatDesc)) $treatDesc = '%';
$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if($treatID == '%'){
$sql = "SELECT * FROM Treatment WHERE description = '$treatDesc' ";}
else{
$sql = "SELECT * FROM Treatment WHERE treatID = '$treatID' ";}
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
		
		<th>Treatment ID</th>
		<th>Description</th>
				
	</tr>	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
		
     		<td> <input type="text" value="<?php echo $result1["treatID"];?>"size =20></td>
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