<!DOCTYPE html>

<html> 
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Provider Input</title>
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
$firstName = $_POST['firstName'];

$lastName = $_POST['lastName'];


$sql="SELECT firstName, lastName FROM Provider where firstName = '$firstName' AND lastName = '$lastName' ";		
if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $check_user=mysqli_num_rows($result);
  
  mysqli_free_result($result);
  }
//echo $check_user;

if($check_user > 0)
		{
				echo "<div id='message'><h3>This Provider record already exists</h3><br/>Please
				check the Provider description and try again.   <a href='providerLoad.php'>Return to Provider Input</a></div>";
		}
		
else
		{
		
			
			$query = "INSERT INTO Provider(firstName, lastName) VALUES ('$firstName', '$lastName')";
			$result = mysqli_query($con,$query);
			if($result)
			{
				echo "<div id='message'><h3>Provider information loaded successfully. </h3>
				<br/>Click here to return to Provider Input.   <a href='providerLoad.php'>Return to Provider Input</a></div>";
			}
			else{
				echo "<div id='message'><h3>Unsuccessful db update of Provider data</h3>";
			}
		}

					
mysqli_close($con);	
?>
</div>
</body>
</html>

