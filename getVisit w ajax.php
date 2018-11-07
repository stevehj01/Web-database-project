      
<?php
 
$clinicNum = $_POST['clinicNum'];
 
$con=mysqli_connect("localhost","medical","password","MedicalStudyDB");
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM Visit WHERE clinicNum = '$clinicNum' ";
$result = mysqli_query($con, $sql);


?>
<html>
<head>
<meta charset="utf-8">
   <meta http-equiv="Content-Style-Type" content="text/css">
<title>Visit Results</title>
<link href="medicalStudyDB.css" rel="stylesheet" type="text/css" />
<script>
function requestStudy(studyID) {
 document.getElementById("output").innerHTML= studyID;
    if (studyID == "") {
        document.getElementById("textHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("textHint").innerHTML = this.responseText;
            }
        };
        //send request to server php query
        xmlhttp.open("GET","displayStudy.php?studyID="+studyID,true);
        xmlhttp.send();
    }
}
</script>

</head>
<body id ="background">
        <div id ="wrap"/> 
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
           


<div id = 'VisitDisplay' >
<form>
	<table>
	<tr>
		
		<th>Date</hd>
		<th>Visit ID</hd>
		<th>Diagnosis</hd>
		<th>Treatment</hd>
		<th>Test ID</hd>
		<th>Study ID</hd>
	</tr>	
	<?php
		while ($result1 = mysqli_fetch_array($result)) {			
		?>
	<tr>
			<td><input type="text"  value="<?php echo $result1["date1"];?>"size =10 name = "date1" ></td>
     		<td><input type="text"  value="<?php echo $result1["visitID"];?>"size =10 name = "visitID" ></td>
     		<td><input type="submit"   value="<?php echo $result1["visitID"];?>"size =20 name = "visitID" onclick="requestStudy(visitID.value)"></td>
     		<td><input type="submit"   value="<?php echo $result1["visitID"];?>"size =20 name = "visitID" onclick="requestStudy(visitID.value)"></td>
     		<td><input type="submit"   value="<?php echo $result1["visitID"];?>"size =20 name = "visitID" onclick="requestStudy(visitID.value)"></td>
     		
       		<td><input type="submit"  value="<?php echo $result1["studyID"];?>"size =10 name = "submit" onclick="requestStudy('<?php echo $result1["studyID"];?>.value')"></td>
       		
       		
            
  	</tr>
  	<?php
           }
           ?>
  </table>
</form>
</div>
</div>
<p id="output">data</p>
<?php
mysqli_close($con);
?>
</body>
</html>
