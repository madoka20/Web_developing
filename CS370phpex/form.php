<!DOCTYPE html>
<html>
<head>
  <style>
    .smt{
      margin-top: 20px;
    }
    .report td{
      border: 1px solid #000;

    }
    .report{
        border-collapse: collapse;
    }
  </style>
<title>Untitled Document</title>

</head>

<body>
<p>Clinic Schedule's Database Query</p>


 <?php 
   $link = pg_connect("host=itcsdbms user=fumx17 dbname=clinicsch")
          or die ("Could not connect to database clinicsch");
  
    
    $query = "SELECT * FROM address order by zip";
    $result = pg_query ($query)
        or die ("Query failed");

  // printing HTML result

  print "<table class=\"report\">\n";
    print "\t<tr>\n";
        print "\t<th>City</th>\n";
           print "\t<th>State</th>\n";
              print "\t<th>Zip</th>\n";
                 print "\t<th>Id</th>\n";
        print "\t</tr>\n";
  while($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
    print "\t<tr>\n";
    while(list($col_name, $col_value) = each($line)){
      print "\t\t<td>$col_value</td>\n";
    }
    print "\t</tr>\n";
  }
  print "</table>\n";


?>
 
   
   


<form method="POST" action="insert.php">
 <p>  Enter CSZ data to insert to clinic schedule database: </p>
 

<label for="city">
    City:<input type="text" name="city" id="city">
</label>

<label for="state">
     State: <input type="text" name="state" id="state">
</label>
 <label for="zip">
      Zip:<input type="text" name="zip" id="zip">
  </label>
<br>
<div class="smt">
  <button type="submit">Insert</button>

</div>

</form>


<form method="POST" action="delete.php">
 <p>  Enter the zip code for deletion:</p>
 
 <label for="zip">
      Zip:<input type="text" name="zip" id="zip">
  </label>
<br>
<div class="smt">
 <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>

</div>

</form>

<p>&nbsp; </p>
</body>
</html>