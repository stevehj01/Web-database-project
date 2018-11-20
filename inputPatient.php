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
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$DOB = $_POST['DOB'];
$gender = $_POST['gender'];
$assist = $_POST['assistDesc'];
$study = $_POST['studyDesc'];


$sql="SELECT clinicNum FROM Patient where clinicNum = '$clinicNum' ";		
if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $check_user=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
//echo $check_user;
	

if($check_user > 0)
		{
				echo "<div id='message'><h3>This clinic number already exists</h3><br/>Please
				check the clinic number and try again.   <a href='patientLoad.php'>Return to Patient Load</a></div>";
		}
		
else
		{
			$sql="SELECT assistID FROM AssistiveDevice WHERE description = '$assist' ";
			$result1 = mysqli_query($con,$sql);

			$result11=mysqli_fetch_array($result1,MYSQLI_ASSOC);
			$assistID = $result11['assistID'];
		
			$query22 = "INSERT INTO PatientAssistDevice(clinicNum, assistID) VALUES ('$clinicNum', '$assistID')";
			$result22 = mysqli_query($con,$query22);
			if($result22)
			{
				echo "<div id='message'><h3>Assistive Device data loaded successfully. </h3>
				</div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Assistive Device</h3>";
			}
			
			
			$sql2="SELECT studyID FROM Study WHERE description = '$study' ";
			$result2 = mysqli_query($con,$sql2);

			$result21=mysqli_fetch_array($result2,MYSQLI_ASSOC);
			$studyID = $result21['studyID'];
		
			$query3 = "INSERT INTO PatientStudy(clinicNum, studyID) VALUES ('$clinicNum', '$studyID')";
			$result32 = mysqli_query($con,$query3);
			if($result32)
			{
				echo "<div id='message'><h3>Patient to Study data loaded successfully. </h3>
				</div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Patient to Study data</h3>";
			}
			
			$query = "INSERT INTO Patient(clinicNum, firstName, lastName, DOB, gender) VALUES ('$clinicNum', '$firstName','$lastName','$DOB','$gender')";
					
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>Patient data loaded successfully. </h3>
				<br/>Click here to return to Patient Load  <a href='patientLoad.php'>Return to Patient Load</a></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Patient</h3>";
			}
			
		}
	
				
mysqli_close($con);	
?>
</div>
</div>
</body>
</html>

