
<?php
$clinicNum = $_POST['clinicNum'];
if (empty($clinicNum)) $clinicNum = '%';
$gender = $_POST['gender'];
$condition = $_POST['condition'];
$studyID = $_POST['studyID'];
$studyDesc = $_POST['studyDesc'];
$IRBNum = $_POST['IRBNum'];




$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

$sql="CALL fullGETStudy( '$studyID', '$IRBNum', '$studyDesc', '$condition', '$clinicNum', '$gender');";

//$sql="SELECT * FROM `PatientStudy` WHERE clinicNum = '4-455-999' ";
$result = mysqli_query($con,$sql);


?>
<html>
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Study Results</title>
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
           
<div class="containerQuery">
  <?php 
  			echo nl2br("\n\n");
  			echo nl2br("<b>"."Query results for Studies based on:\n "."</b>");
			if($clinicNum != '%') {echo "clinicNum: ".$clinicNum; 
			echo nl2br("\n");}
			if($gender != '%') {echo "Patient Gender: ".$gender; 
			echo nl2br("\n");} 
			if($condition != '%'){ echo "Condition: ".$condition; 
			echo nl2br("\n");}
			if($studyID != '%'){ echo "StudyID: ".$studyID; 
			echo nl2br("\n");}
			if($studyDesc != '%') {echo "Diagnosis: ".$studyDesc; 
			echo nl2br("\n");}
			if($IRBNum != '%'){ echo "IRB Number: ".$IRBNum; }
			
	?>
</div>

<div id = 'formLoc' >
<form>
	<table>
	<tr>
		
		<th>Study ID</hd>
		<th>Study Description</hd>
		<th>IRB Number</hd>
		<th>Condition</hd>
		
		
	</tr>	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
		
     		<td> <input type="text" value="<?php echo $result1["studyID"];?>"size =12></td>
     		<td><input type="text" value="<?php echo $result1["sDescription"];?>"size =30></td>
  			<td> <input type="text" value="<?php echo $result1["IRBNum"];?>"size =20></td>
     		<td><input type="text" value="<?php echo $result1["cDescription"];?>"size =30></td>
  			

      
            
            
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
