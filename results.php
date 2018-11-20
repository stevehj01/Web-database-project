      
<?php
$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Visit Results</title>
<link href="medicalStudyDB.css" rel="stylesheet" type="text/css" />
<style>
table, th, td {
    border: 1px solid black;
}
</style>

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
           
<?php

if (isset($_POST['testID'])) 
{
        $testID = $_POST['testID'];
        
        $sql = "SELECT * FROM TestResults WHERE testID = '$testID' ";
		$result = mysqli_query($con, $sql);
		?>
		<div id = 'formLoc' >
		<p>Test Results Detail for Test ID: <?php echo $testID;?>
		<br>
		<table>
		<tr>
		
			<th style="width:100px">Test ID</th>
			<th style="width:100px">Test Processing Complete</th>
			<th style="width:100px">Test Analysis Complete</th>
			<th style="width:100px">Test File Name</th>
		</tr>	
		<?php
		while ($result1 = mysqli_fetch_array($result)) 
		{			
		?>
			<tr>
				<td align="center" style="background-color:white;"><?php echo $result1["testID"];?> </td>
     			<td align="center" style="background-color:white;"><?php echo $result1["dataProcessingComplete"];?></td>
     			<td align="center" style="background-color:white;"><?php echo $result1["dataAnalysisComplete"];?></td>
     			<td align="center" style="background-color:white;"><?php echo $result1["file1"];?></td>           
  			</tr>
  		<?php
         }
         ?>
  		</table>
		</div>
<?php
}
    
elseif (isset($_POST['treatID'])) 
{
        $treatID = $_POST['treatID'];
        $sql2 = "SELECT * FROM Treatment WHERE treatID = '$treatID' ";
		$result2= mysqli_query($con, $sql2);
		?>
		<div id = 'formLoc' >
		<p>Treatment Description for Treatment ID: <?php echo $treatID;?>
		<table>
		<tr>
			<th style="width:100px">Treatment ID</th>
			<th style="width:200px">Description</th>
		</tr>	
		<?php
		while ($result22 = mysqli_fetch_array($result2)) 
		{			
			?>
			<tr>
				<td style="background-color:white;"><?php echo $result22["treatID"];?> </td>
     			<td style="background-color:white;"><?php echo $result22["description"];?></td>      		            
  			</tr>
  		<?php
        }
        ?>
  		</table>
		</div>
<?php
 }
 
 else 
{
        $diagID = $_POST['diagID'];
        $sql2 = "SELECT * FROM Diagnosis WHERE diagID = '$diagID' ";
		$result2= mysqli_query($con, $sql2);
		?>
		<div id = 'formLoc' >
		<p>Diagnosis Description for Diagnosis ID: <?php echo $diagID;?>
		<table>
		<tr>
			<th style="width:100px">Diagnosis ID</th>
			<th style="width:200px">Description</th>
		</tr>	
		<?php
		while ($result22 = mysqli_fetch_array($result2)) 
		{			
			?>
			<tr>
				<td style="background-color:white;"><?php echo $result22["diagID"];?> </td>
     			<td style="background-color:white;"><?php echo $result22["description"];?></td>      		            
  			</tr>
  		<?php
        }
        ?>
  		</table>
		</div>
<?php
 }
mysqli_close($con);
?>
</div>
</body>
</html>

