<html>

<head>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

</head>

<body>

<script language="php"> 
     $link = pg_connect("host=itcsdbms user=fumx17 dbname=clinicsch")
          or die ("Could not connect to database clinicsch");
    print ("Connected successfully");
    
    $query = "SELECT * FROM appointments ";
    $result = pg_query ($query)
        or die ("Query failed");

	// printing HTML result

	print "<table>\n";
	while($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
		print "\t<tr>\n";
		while(list($col_name, $col_value) = each($line)){
			print "\t\t<td>$col_value</td>\n";
		}
		print "\t</tr>\n";
	}
	print "</table>\n";
    $apptnum=$_POST['apptnum'];
$appttime = $_POST['appttime'];
	$dischargetime=$_POST['dischargetime'];
	$walkintime=$_POST['walkintime'];
	$id = $_POST['id'];
	$roomnum = $_POST['roomnum'];
    $query = "update appointments set appttime=TO_TIMESTAMP('$appttime','YYYY-MM-DD HH:MI:SS'),dischargetime=TO_TIMESTAMP('$dischargetime','YYYY-MM-DD HH:MI:SS'),walkintime=TO_TIMESTAMP('$walkintime','YYYY-MM-DD HH:MI:SS'),id='$id',roomnum='$roomnum' where apptnum='$apptnum'";
    $result = pg_query ($query)
        or die ("Query failed");
	
	
    pg_close($link);
header("Location: form_appointments.php");
    </script>
</body>

</html>