<!DOCTYPE html >
<html>
<title>Test Query</title>
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


?>

            
            <div class="container2">
                <h2>Query for Test Results</h2>
                    <form name="test" action="resultTest.php"  id = "test" method="post">
                    		Test ID: <input type="text" name="testID" id="testID" /> 
                    		Visit ID: <input type="text" name="visitID" id="visitID" /> 
                            <input type="submit"  value ="Enter Test ID or Visit ID" name ="input"</>
                    </form>
                                  
                </div>               
<?php
mysqli_close($con);
?>
        </div>
    </body>
</html>