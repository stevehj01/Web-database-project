<?php
$clinicNum = $_POST['clinicNum'];
if (empty($clinicNum)) $clinicNum = '%';
$patientLName= $_POST['lastName'];
if (empty($patientLName)) $patientLName = '%';
$gender = $_POST['gender'];

$ICD9Prim = $_POST['ICD9Prim'];
$ICD9Sec = $_POST['ICD9Sec'];
$condDesc = $_POST['condition'];
$studyID = $_POST['studyID'];
$IRBNum = $_POST['IRBNum'];
$providerPrimLName = $_POST['providerPrimLName'];
$providerSecLName = $_POST['providerSecLName'];
$diagnosisDesc = $_POST['diagnosisDesc'];
$treatDesc = $_POST['treatmentDesc'];

$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

//$sql="CALL pctGETPatient('%', '$condDesc', '$treatDesc'); ";
$sql = "CALL fullGETPatient( '$clinicNum', '$patientLName', '$gender', '$ICD9Prim', '$ICD9Sec', '$condDesc', '$studyID', '$IRBNum', '$providerPrimLName', '$providerSecLName', '$diagnosisDesc', '$treatDesc');";
//$sql="CALL fullGETPatient( '$clinicNum', '%', '$gender', '%', '%', '%', '%', '%', '%', '%', '%', '%');";
$result = mysqli_query($con,$sql);


?>
<html>
<head>
<title>Study Results</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="medicalStudyDB.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
function requestVisits(clinicNum) {
  document.getElementById("output").innerHTML= clinicNum;
    if (clinicNum == "") {
        document.getElementById("textHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("textHint").innerHTML = this.responseText;
            }
        };
        //send request to server php query
        xmlhttp.open("GET","displayVisits.php?clinicNum="+clinicNum,true);
        xmlhttp.send();
    }
}
</script>

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
  			echo nl2br("<b>"."Query results for Patients based on:\n "."</b>");
			if($clinicNum != '%') {echo "clinicNum: ".$clinicNum; 
			echo nl2br("\n");}
			if($patientLName != '%') {echo "Patient Last Name: ".$patientLName; 
			echo nl2br("\n");}
			if($gender != '%') {echo "Patient Gender: ".$gender; 
			echo nl2br("\n");}
			if($ICD9Prim != '%'){ echo "ICD9 Primary Code: ".$ICD9Prim; 
			echo nl2br("\n");}
			if($ICD9Sec != '%'){ echo "ICD9 Secondary Code: ".$ICD9Sec; 
			echo nl2br("\n");}
			if($condDesc != '%'){ echo "Condition: ".$condDesc; 
			echo nl2br("\n");}
			if($studyID != '%'){ echo "StudyID: ".$studyID; 
			echo nl2br("\n");}
			if($IRBNum != '%'){ echo "IRB Number: ".$IRBNum; 
			echo nl2br("\n");}
			if($providerPrimLName != '%'){ echo "Primary Provider Last Name: ".$providerPrimLName; 
			echo nl2br("\n");}
			if($providerSecLName != '%'){ echo "Secondary Provider Last Name: ".$providerSecLName;
			echo nl2br("\n");}
			if($diagnosisDesc != '%') {echo "Diagnosis: ".$diagnosisDesc; 
			echo nl2br("\n");}
			if($treatDesc != '%') echo "Treatment: ".$treatDesc; 
	?>

</div>

<div id = 'formLoc' >

	<table>
	<tr>
		<th>Clinic Number</hd>
		<th>Name</hd>
		<th>Date of Birth</hd>
		<th>Gender</hd>
		
	</tr>	
	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
		
     		<td> <input type="text" name="clinicNum" id="clinicNum"value="<?php echo $result1["clinicNum"];?>"size =10></td>
     		<td><input type="text" value="<?php echo $result1["name"];?>"size =18></td>
  			<td><input type="text" value="<?php echo $result1["DOB"];?>"size =10></td>
  			<td><input type="text" value="<?php echo $result1["gender"];?>"size =10></td>			
  				
  			<td><input type="submit" name="submit" onclick="requestVisits(clinicNum.value)" value = "Request Visits"></td>    
  			  	</tr>
  	
  	<?php
           }
           ?>
  </table>

</div>
<div id="textHint"><b>Data</b></div>

<p id="output">data</p>
<?php
mysqli_close($con);

?>
</body>
</html>