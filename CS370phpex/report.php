<!DOCTYPE html>
<html>
<head>
  
<title>Untitled Document</title>
<style> 
  .report td{
      border: 1px solid #000;

    }
    .report{
        border-collapse: collapse;
    }
</style>
</head>

<body>
<p>Clinic Schedule's Reports</p>


 <?php 
   $link = pg_connect("host=itcsdbms user=fumx17 dbname=clinicsch")
          or die ("Could not connect to database clinicsch");
  
    
    $query = "SELECT id,walkInTime,dischargeTime
FROM Appointments,Room
WHERE Appointments.roomNum=Room.roomNum
AND Type='ER'";
    $result = pg_query ($query)
        or die ("Query failed");

  // printing HTML result
print "ER room log";
  print "<table class=\"report\">\n";
    print "\t<tr>\n";
        print "\t<th>id</th>\n";
           print "\t<th>walkintime</th>\n";
              print "\t<th>dischargetime</th>\n";
          
        print "\t</tr>\n";
  while($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
    print "\t<tr>\n";
    while(list($col_name, $col_value) = each($line)){
      print "\t\t<td>$col_value</td>\n";
    }
    print "\t</tr>\n";
  }
  print "</table>\n";

//----------------------------------
 print"<hr>";
  $query = "SELECT name, role, Person.id, apptnum
FROM Person, AttendStaff
WHERE role = 'staff'
AND Person.id = AttendStaff.id
";
    $result = pg_query ($query)
        or die ("Query failed");

  // printing HTML result
print "Appointment record";
  print "<table class=\"report\">\n";
    print "\t<tr>\n";
        print "\t<th>name</th>\n";
           print "\t<th>role</th>\n";
              print "\t<th>id</th>\n";
               print "\t<th>apptnum</th>\n";
          
        print "\t</tr>\n";
  while($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
    print "\t<tr>\n";
    while(list($col_name, $col_value) = each($line)){
      print "\t\t<td>$col_value</td>\n";
    }
    print "\t</tr>\n";
  }
  print "</table>\n";
//----------------------------------------
   print"<hr>";
  $query = "SELECT Address.zip,Address.state,Address.city,Person.name
FROM Address,Person
WHERE Address.id=Person.id
AND Person.role='staff';
";
    $result = pg_query ($query)
        or die ("Query failed");

  // printing HTML result
print "Staff address";
  print "<table class=\"report\">\n";
    print "\t<tr>\n";
        print "\t<th>zip</th>\n";
           print "\t<th>state</th>\n";
              print "\t<th>city</th>\n";
               print "\t<th>name</th>\n";
          
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
 
   
   


</body>
</html>