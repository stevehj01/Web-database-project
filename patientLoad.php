<!DOCTYPE html >

<html>


<title>Patient Input</title>
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

$sql = "SELECT description FROM AssistiveDevice";
$result = mysqli_query($con, $sql);

$sql1= "SELECT description FROM Study";
$result1 = mysqli_query($con, $sql1);

?>

            
            <div class="container">
                <h2>Enter Patient Data</h2>
                    <form name="patient" action="inputPatient.php"  id = "patient" method="post">
                            Clinic Number: <input type="text" name="clinicNum" id="clinicNum"/> 
                            First Name: <input type="text" name="firstName" id="firstName" /> 
                            Last Name: <input type="text" name="lastName" id="lastName"/><br>
                            Date of Birth: <input type="date" name="DOB" id="DOB"/> 
                            Gender: <input type="text" name="gender" id="gender"/>
                            Assistive Device: <select name="assistDesc" form="patient">
                            <option selected value =""></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result)) {                                            
                                         echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; 
                                     }
                            ?>     
                            </select>    
                            <br>
                            Study Description: <select name="studyDesc" form="patient">
                            <option selected value =""></option>
                            <?php
                                    while ($row = mysqli_fetch_array($result1)) {                                            
                                         echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; 
                                     }
                            ?>     
                            </select>    
                            <br>

                            <input type="submit"  value ="Enter Patient Data" name ="input" </>
                             
                    </form>
                                  
				</div>
                
        
                    <br>

<?php
mysqli_close($con);
?>
        </div>
    </body>
</html>