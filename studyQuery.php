<!DOCTYPE html >
<html>
<title>Study Query</title>
 <meta charset="utf-8">
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
                        
                        <li><a href="index.php">Load Database Information</a>
                            <ul class="dropDownMenu2">
                                <li><a href="patientLoad.php">Patient Info</a></li>
                                <li><a href="visitLoad.php">Visit Info</a></li>
                                <li><a href="studyLoad.php">Study Info</a></li>    
                                <li><a href="diagnosisLoad.php">Diagnosis Info</a></li>
                                <li><a href="treatmentLoad.php">Treatment Info</a></li>
                                <li><a href="systemLoad.php">System Info</a></li>    
                                <li><a href="icd9Load.php">ICD9 Info</a></li>
                                <li><a href="conditionLoad.php">Condition Info</a>
                                 <li><a href="providerLoad.php">Provider Info</a>
                                  <li><a href="assistLoad.php">Assistive Device Info</a>
                                  <li><a href="testLoad.php">Test Results Info</a>
                            </ul>
                        </li>
                        <li><a href="index.php">Query Database Information</a>
                            <ul class="dropDownMenu2">
                                <li><a href="patientQuery.php">Patient Info</a></li>
                                <li><a href="visitQuery.php">Visit Info</a></li>
                                <li><a href="studyQuery.php">Study Info</a></li>    
                                <li><a href="diagnosisQuery.php">Diagnosis Info</a></li>
                                <li><a href="treatmentQuery.php">Treatment Info</a></li>
                                <li><a href="systemQuery.php">System Info</a></li>    
                                <li><a href="icd9Query.php">ICD9 Info</a></li>
                                <li><a href="conditionQuery.php">Condition Info</a>
                                 <li><a href="providerQuery.php">Provider Info</a>
                                  <li><a href="assistQuery.php">Assistive Device Info</a>
                                  <li><a href="testQuery.php">Test Results</a>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>        
            <?php
$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT description FROM ConditionTable";
$result = mysqli_query($con, $sql);

$sql2 = "SELECT description FROM Study";
$result2 = mysqli_query($con, $sql2);

$sql4 = "SELECT studyID FROM Study";
$result4 = mysqli_query($con, $sql4);

$sql5 = "SELECT IRBNum FROM Study";
$result5 = mysqli_query($con, $sql5);


?>

            
            <div class="container2">
                <h2>Query for Studies</h2>
                    <form name="study1" action="getStudy.php"  id = "study1" method="post">
                    		Clinic Number: <input type="text" name="clinicNum" id="clinicNum" /> 
                            Gender<select id="gender" name="gender">
                                <option selected value ="%"></option>
  								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
						    Condition: <select name="condition" id="condition">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                             echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; 
                                     }
                            ?>        
                            </select>  
                            Study ID: <select name="studyID" id="studyID">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result4)) {
                                             echo '<option value="'.$row['studyID']. '">'.$row['studyID']. '</option>'; 
                                     }
                            ?>        
                            </select>
                            <br>
                            Study Description: <select name="studyDesc" id="studyDesc">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result2)) {
                                             echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; 
                                     }
                            ?>        
                            </select>  
                            
                            IRB Number: <select name="IRBNum" id="IRBNum">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result5)) {
                                             echo '<option value="'.$row['IRBNum']. '">'.$row['IRBNum']. '</option>'; 
                                     }
                            ?>        
                            </select>  
                            
							<br>
                            <input type="submit"  value ="Get Study Data" name ="input"</>
                    </form>
                                  
                </div>               
<?php
mysqli_close($con);
?>

    </body>
</html>