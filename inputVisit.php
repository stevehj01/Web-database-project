<!DOCTYPE html>

<html> 
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Patient Input</title>
<link href="medicalStudyDB.css" rel="stylesheet" type="text/css" />
</head>

<body id ="background">
        <div id ="wrap"> 
        <div id ="headerBox">
                <h1>TAS Medical Studies</h1>
            </div>
        
 <?php

$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");

// Check connection					
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$clinicNum = $_POST['clinicNum'];
$date1 = $_POST['date1'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$diagDesc = $_POST['diagnosisDescription'];
$treatDesc = $_POST['treatmentDescription'];
$sysDesc = $_POST['systemDescription'];
$providerPrimFirst = $_POST['PPfirst'];
$providerPrimLast = $_POST['PPlast'];
$providerSecFirst = $_POST['SPfirst'];
$providerSecLast = $_POST['SPlast'];
$ICDNumPrim = $_POST['PICD9'];
$ICDNumSec = $_POST['SICD9'];
$studyDesc = $_POST['studyDescription'];
$referral = $_POST['referral'];


			$sql="SELECT studyID FROM Study WHERE description = '$studyDesc' ";
			$result1 = mysqli_query($con,$sql);
			$result11=mysqli_fetch_array($result1,MYSQLI_ASSOC);
			$studyID = $result11['studyID'];
			
			$sql2="SELECT providerID FROM Provider WHERE firstName = '$providerPrimFirst' AND lastName = '$providerPrimLast'";
			$result2 = mysqli_query($con,$sql2);
			$result21=mysqli_fetch_array($result2,MYSQLI_ASSOC);
			$providerID = $result21['providerID'];
			
			$sql3="SELECT providerID FROM Provider WHERE firstName = '$providerSecFirst' AND lastName = '$providerSecLast'";
			$result3 = mysqli_query($con,$sql3);
			$result31=mysqli_fetch_array($result3,MYSQLI_ASSOC);
			$providerSecID = $result31['providerID'];
			
			$sql4="SELECT ICDNum FROM ICD9 WHERE description = '$ICDNumPrim' ";
			$result4 = mysqli_query($con,$sql4);
			$result41=mysqli_fetch_array($result4,MYSQLI_ASSOC);
			$ICDNum = $result41['ICDNum'];
			
			$sql5="SELECT ICDNum FROM ICD9 WHERE description = '$ICDNumSec' ";
			$result5 = mysqli_query($con,$sql5);
			$result51=mysqli_fetch_array($result5,MYSQLI_ASSOC);
			$ICDNumSec = $result51['ICDNum'];
				
			
			$query = "INSERT INTO Visit(date1, height, weight, providerIDPrim, providerIDSec, ICDNumPrim, ICDNumSec, clinicNum, referral, studyID) VALUES ('$date1', '$height','$weight', '$providerID', '$providerSecID', '$ICDNum', '$ICDNumSec' ,'$clinicNum', '$referral', '$studyID')";		
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>Visit data loaded successfully. </h3>
				<br/>Click here to return to Visit Load  <a href='visitLoad.php'>Return to Visit Load</a></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Visit</h3>";
			}
			$visitID = $con->insert_id;
			
			$sql6="SELECT diagID FROM Diagnosis WHERE description = '$diagDesc' ";
			$result6 = mysqli_query($con,$sql6);
			$result61=mysqli_fetch_array($result6,MYSQLI_ASSOC);
			$diagID = $result61['diagID'];
			
			$query = "INSERT INTO DiagnosisList(diagID, visitID) VALUES ('$diagID', '$visitID')";		
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>Diagnosis link data loaded successfully. </h3></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Diagnosis link</h3>";
			}
			
			$sql7="SELECT treatID FROM Treatment WHERE description = '$treatDesc' ";
			$result7 = mysqli_query($con,$sql7);
			$result71=mysqli_fetch_array($result7,MYSQLI_ASSOC);
			$treatID = $result71['treatID'];
			
			$query = "INSERT INTO TreatmentList(treatID, visitID) VALUES ('$treatID', '$visitID')";		
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>Treatment link data loaded successfully. </h3></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Treatment link</h3>";
			}

			$sql8="SELECT systemID FROM System WHERE description = '$sysDesc' ";
			$result8 = mysqli_query($con,$sql8);
			$result81=mysqli_fetch_array($result8,MYSQLI_ASSOC);
			$systemID = $result81['systemID'];
			
			$query = "INSERT INTO SystemList(systemID, visitID) VALUES ('$systemID', '$visitID')";		
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>System link data loaded successfully. </h3></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of System link</h3>";
			}
		
mysqli_close($con);	
?>
</div>
</div>
</body>
</html>

