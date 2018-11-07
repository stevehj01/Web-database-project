<!DOCTYPE html>

<html> 
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Test Input</title>
<link href="medicalStudyDB.css" rel="stylesheet" type="text/css" />
</head>

<body id ="background">
        <div id ="wrap"/> 
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
$visitID = $_POST['visitID'];
$fileName = $_POST['fileName'];
$pDate = $_POST['processDate'];
$aDate = $_POST['analysisDate'];


		
			
			$query = "INSERT INTO TestResults(visitID, dataProcessingComplete, dataAnalysisComplete, file1) VALUES ('$visitID', '$pDate', '$aDate', '$fileName')";
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>Test results information loaded successfully. </h3>
				<br/>Click here to return to Test Results Input.   <a href='testLoad.php'>Return to Test Results Input</a></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Test Results data</h3>";
			}
		

					
mysqli_close($con);	
?>
</div>
</body>
</html>

