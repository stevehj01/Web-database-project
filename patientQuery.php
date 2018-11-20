<!DOCTYPE html >
<html>
<title>Patient Query</title>
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

$sql1 = "SELECT description FROM Treatment";
$result1 = mysqli_query($con, $sql1);

$sql2 = "SELECT ICDNum FROM ICD9";
$result2 = mysqli_query($con, $sql2);

$sql3 = "SELECT ICDNum FROM ICD9";
$result3 = mysqli_query($con, $sql3);

$sql4 = "SELECT studyID FROM Study";
$result4 = mysqli_query($con, $sql4);

$sql5 = "SELECT IRBNum FROM Study";
$result5 = mysqli_query($con, $sql5);

$sql6 = "SELECT lastName FROM Provider";
$result6 = mysqli_query($con, $sql6);

$sql7 = "SELECT lastName FROM Provider";
$result7 = mysqli_query($con, $sql7);

$sql8 = "SELECT description FROM Diagnosis";
$result8 = mysqli_query($con, $sql8);


?>

            
            <div class="container2">
                <h2>Query for Patients</h2>
                    <form name="patient1" action="getPatients.php"  id = "patient1" method="post">
                    		Clinic Number: <input type="text" name="clinicNum" id="clinicNum" /> 
                    		Patient Last Name: <input type="text" name="lastName" id="lastName" /> 
                            Gender<select id="gender" name="gender">
                                <option selected value ="%"></option>
  								<option value="M">Male</option>
								<option value="F">Female</option>
							</select>
							<br>
							ICD9 Primary Code: <select name="ICD9Prim" id="ICDNum">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result2)) {
                                             echo '<option value="'.$row['ICDNum']. '">'.$row['ICDNum']. '</option>'; 
                                     }
                            ?>        
                            </select> 
                            ICD9 Secondary Code: <select name="ICD9Sec" id="ICDNum">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result3)) {
                                             echo '<option value="'.$row['ICDNum']. '">'.$row['ICDNum']. '</option>'; 
                                     }
                            ?>        
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
                            IRB Number: <select name="IRBNum" id="IRBNum">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result5)) {
                                             echo '<option value="'.$row['IRBNum']. '">'.$row['IRBNum']. '</option>'; 
                                     }
                            ?>        
                            </select>  
                            Primary Provider Last Name: <select name="providerPrimLName" id="providerPrimLName">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result6)) {
                                             echo '<option value="'.$row['lastName']. '">'.$row['lastName']. '</option>'; 
                                     }
                            ?>        
                            </select>
                            Secondary Provider Last Name: <select name="providerSecLName" id="providerSecLName">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result7)) {
                                             echo '<option value="'.$row['lastName']. '">'.$row['lastName']. '</option>'; 
                                     }
                            ?>        
                            </select>
                            <br>
                            Diagnosis: <select name="diagnosisDesc" id="diagnosisDesc">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result8)) {
                                            echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; 
                                     }
                            ?>         
                            </select>

                            Treatment: <select name="treatmentDesc" id="treatmentDesc">
                            <option selected value ="%"></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result1)) {
                                            echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; 
                                     }
                            ?>         
                            </select>  
							<br>
                            <input type="submit"  value ="Get Patient Data" name ="input"</>
                    </form>
                                  
                </div>               
<?php
mysqli_close($con);
?>
        </div>
    </body>
</html>