<!DOCTYPE html>

<html> 
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Study Input</title>
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
$studyID = $_POST['studyID'];
$description = $_POST['description'];
$irbNum = $_POST['irbNum'];
$condition = $_POST['condition'];

$sql="SELECT studyID FROM Study where studyID = '$studyID' ";		
if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $check_user=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
//echo $check_user;

if($check_user > 0)
		{
				echo "<div id='message'><h3>This study number already exists</h3><br/>Please
				check the study number and try again.   <a href='studyLoad.php'>Return to Study Input</a></div>";
		}
		
else
		{
			$sql="SELECT condID FROM ConditionTable WHERE description = '$condition' ";
			$result1 = mysqli_query($con,$sql);

			$result11=mysqli_fetch_array($result1,MYSQLI_ASSOC);
			$condID = $result11['condID'];
			
			$query = "INSERT INTO Study(studyID, description, IRBNum,condID) VALUES ('$studyID', '$description','$irbNum', '$condID')";
					
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>Study information loaded successfully. </h3>
				<br/>Click here to return to Study Input.   <a href='studyLoad.php'>Return to Study Input</a></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Study data</h3>";
			}
		}
	
					
mysqli_close($con);	
?>
</div>
</div>
</body>
</html>

