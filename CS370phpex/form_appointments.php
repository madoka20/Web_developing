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
  
    
    $query = "SELECT * FROM room order by roomnum";
    $result = pg_query ($query)
        or die ("Query failed");

  // printing HTML result

  print "<table class=\"report\">\n";
    print "\t<tr>\n";
        print "\t<th>apptnum</th>\n";
           print "\t<th>appttime</th>\n";
           print "\t<th>dischargetime</th>\n";
           print "\t<th>walkintime</th>\n";
           print "\t<th>id</th>\n";
           print "\t<th>roomnum</th>\n";
             
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
 
   
   


<form method="POST" action="insert_appointments.php">
 <p>  Enter CSZ data to insert to clinic schedule database: </p>
 

<label for="appttime">
    appttime:<input type="text" name="appttime" id="appttime">
</label>

<label for="dischargetime">
     dischargetime: <input type="text" name="dischargetime" id="dischargetime">
</label>
<label for="walkintime">
     walkintime: <input type="text" name="walkintime" id="walkintime">
</label>
<label for="id">
     patient id: <input type="text" name="id" id="id">
</label>
<label for="roomnum">
     roomnum: <input type="text" name="roomnum" id="roomnum">
</label>
<br>
<div class="smt">
  <button type="submit">Insert</button>

</div>

</form>



<form method="POST" action="update_appointments.php">
 <p> Update existing data: </p>
 
 <label for="apptnum">
    apptnum(PK):<input type="text" name="apptnum" id="apptnum">
</label>
<label for="appttime">
    appttime:<input type="text" name="appttime" id="appttime">
</label>

<label for="dischargetime">
     dischargetime: <input type="text" name="dischargetime" id="dischargetime">
</label>
<label for="walkintime">
     walkintime: <input type="text" name="walkintime" id="walkintime">
</label>
<label for="id">
     patient id: <input type="text" name="id" id="id">
</label>
<label for="roomnum">
     roomnum: <input type="text" name="roomnum" id="roomnum">
</label>
<br>
<div class="smt">
  <button type="submit">Update</button>

</div>

</form>



<form method="POST" action="delete_appointments.php">
 <p>  Enter the appointment number for deletion:</p>
 
 <label for="apptnum">
    apptnum:<input type="text" name="apptnum" id="apptnum">
</label>
<br>
<div class="smt">
 <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>

</div>

</form>

<p>&nbsp; </p>
</body>
</html>