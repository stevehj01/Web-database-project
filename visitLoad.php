<!DOCTYPE html >

<html>


<title>Visit Input</title>
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

$sql = "SELECT description FROM Study";
$resultStudy = mysqli_query($con, $sql);

$sql1 = "SELECT firstName FROM Provider";
$resultProvider11 = mysqli_query($con, $sql1);
$sql11 = "SELECT lastName FROM Provider";
$resultProvider12 = mysqli_query($con, $sql11);
$sql1 = "SELECT firstName FROM Provider";
$resultProvider21 = mysqli_query($con, $sql1);
$sql11 = "SELECT lastName FROM Provider";
$resultProvider22 = mysqli_query($con, $sql11);
$sql2 = "SELECT description FROM ICD9";
$resultCD9 = mysqli_query($con, $sql2);
$sql22 = "SELECT description FROM ICD9";
$resultCD92 = mysqli_query($con, $sql22);
$sql3 = "SELECT description FROM Diagnosis";
$resultDiag = mysqli_query($con, $sql3);
$sql4 = "SELECT description FROM Treatment";
$resultTreat = mysqli_query($con, $sql4);
$sql5 = "SELECT description FROM System";
$resultSys = mysqli_query($con, $sql5);

?>

            
           <div class="containerVisit">
                <h2>Enter Visit Data</h2>
                    <form name="visit" action="inputVisit.php"  id = "study" method="post">
                            Clinic Number: <input type="text" name="clinicNum" id="clinicNum" /> 
                            Study Description: <select name="studyDescription" form="study"><option selected value =""></option>
                            
                            <?php
                            while ($row = mysqli_fetch_array($resultStudy)) {
                                    echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; }?>   
                            </select>
                            <br>
                            Date: <input type="date" name="date1" id="date1"/>  
                            Height (in cm): <input type="text" name="height" id="height"/> 
                            Weight (in kg): <input type="text" name="weight" id="weight"/> <br>
                            Diagnosis: <select name="diagnosisDescription" form="study">
                            <option selected value =""></option>
                            <?php
                            while ($row = mysqli_fetch_array($resultDiag)) { 
                                    echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; }?>       
                            </select>
                            Treatment: <select name="treatmentDescription" form="study">
                            <option selected value =""></option>
                            <?php
                            while ($row = mysqli_fetch_array($resultTreat)) { 
                                    echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; }?>       
                            </select>
                            <br>
                            System: <select name="systemDescription" form="study">
                            <option selected value =""></option>
                            <?php
                            while ($row = mysqli_fetch_array($resultSys)) { 
                                    echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; }?>       
                            </select>
                            <br>
                            Primary Provider First Name: <select name="PPfirst" form="study">
                            <?php
                            while ($row = mysqli_fetch_array($resultProvider11)) { 
                                    echo '<option value="'.$row['firstName']. '">'.$row['firstName']. '</option>'; }?>       
                            </select>
                            
                            Primary Provider Last Name: <select name="PPlast" form="study">
                            <?php
                            while ($row = mysqli_fetch_array($resultProvider12)) { 
                                    echo '<option value="'.$row['lastName']. '">'.$row['lastName']. '</option>'; }?>       
                            </select>
                            <br>
                            Secondary Provider First Name: <select name="SPfirst" form="study">
                            <option selected value =""></option>
                            <?php
							while ($row = mysqli_fetch_array($resultProvider21)) { 
                                    echo '<option value="'.$row['firstName']. '">'.$row['firstName']. '</option>'; }?>       
                            </select>
                            
                            Secondary Provider Last Name: <select name="SPlast" form="study">
                            <option selected value =""></option>
                            <?php
                            while ($row = mysqli_fetch_array($resultProvider22)) {
                                    echo '<option value="'.$row['lastName']. '">'.$row['lastName']. '</option>'; }?>           
                            </select>
                            <br>
                            Primary ICD9 Description: <select name="PICD9" form="study">
                            <option selected value =""></option>
                            <?php
                            while ($row = mysqli_fetch_array($resultCD9)) {
                                    echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; }?>     
                            </select>

                            Secondary ICD9 Description: <select name="SICD9" form="study">
                            <option selected value =""></option>
                            <?php
                            while ($row = mysqli_fetch_array($resultCD92)) {
                                    echo '<option value="'.$row['description']. '">'.$row['description']. '</option>'; }?>       
                            </select>
                            <br>
                            
                            Referral: <input type="text" name="referral" id="referral"/>                              
                            <br>
                            <input type="submit"  value ="Enter Visit Data" name ="input"</>
                            
                    </form>
				</div>
                
        
                    <br>

<?php
mysqli_close($con);
?>

    </body>
</html>