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
    
    $query = "SELECT * FROM address ";
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
    

	$zip = $_POST['zip'];
    $query = "delete from address where zip='$zip'";
    $result = pg_query ($query)
        or die ("Query failed");
	
	
    pg_close($link);
header("Location: form.php");
    </script>
</body>

</html>