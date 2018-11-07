<!DOCTYPE html>

<html> 
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Condition Input</title>
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

$description = $_POST['description'];


$sql="SELECT description FROM ConditionTable where description = '$description' ";		
if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $check_user=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
//echo $check_user;

if($check_user > 0)
		{
				echo "<div id='message'><h3>This Condition record already exists</h3><br/>Please
				check the Condition description and try again.   <a href='conditionLoad.php'>Return to Condition Input</a></div>";
		}
		
else
		{
		
			
			$query = "INSERT INTO ConditionTable(description) VALUES ('$description')";
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>Condition information loaded successfully. </h3>
				<br/>Click here to return to Condition Input.   <a href='conditionLoad.php'>Return to Condition Input</a></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Condition data</h3>";
			}
		}

					
mysqli_close($con);	
?>
</div>
</body>
</html>

