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
  
    
    $query = "SELECT * FROM person order by id";
    $result = pg_query ($query)
        or die ("Query failed");

  // printing HTML result

  print "<table class=\"report\">\n";
    print "\t<tr>\n";
        print "\t<th>id</th>\n";
           print "\t<th>birthdate</th>\n";
              print "\t<th>name</th>\n";
                 print "\t<th>role</th>\n";
                  print "\t<th>isprimary</th>\n";
                   print "\t<th>lastdate</th>\n";
                    print "\t<th>lastuser</th>\n";
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
 
   
   


<form method="POST" action="insert_person.php">
 <p>  Enter person data to insert to clinic schedule database: </p>
 

<label for="id">
    id:<input type="text" name="id" id="id">
</label>

<label for="birthdate">
     birthdate: <input type="text" name="birthdate" id="birthdate">
</label>
 <label for="name">
      name:<input type="text" name="name" id="name">
  </label>
  <label for="role">
    role:
   <select name="role" id="role">
     <option value="staff">staff</option>
     <option value="patient">patient</option>
   </select>
   </label>
    <label for="isprimary">
    isprimary
   <select name="isprimary" id="isprimary">
     <option value="TRUE">TRUE</option>
     <option value="FALSE">FALSE</option>
   </select>
   </label>
<br>
<div class="smt">
  <button type="submit">Insert</button>

</div>

</form>



<form method="POST" action="update_person.php">
 <p> Update existing data: </p>
 
<label for="id">
    id(PK):<input type="text" name="id" id="id">
</label>

<label for="birthdate">
     birthdate: <input type="text" name="birthdate" id="birthdate">
</label>
 <label for="name">
      name:<input type="text" name="name" id="name">
  </label>
  <label for="role">
    role:
   <select name="role" id="role">
     <option value="staff">staff</option>
     <option value="patient">patient</option>
   </select>
   </label>
    <label for="isprimary">
    isprimary
   <select name="isprimary" id="isprimary">
     <option value="TRUE">TRUE</option>
     <option value="FALSE">FALSE</option>
   </select>
   </label>

<br>
<div class="smt">
  <button type="submit">Update</button>

</div>

</form>



<form method="POST" action="delete_person.php">
 <p>  Enter the id for deletion:</p>
 
 <label for="id">
      id:<input type="text" name="id" id="id">
  </label>
<br>
<div class="smt">
 <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>

</div>

</form>

<p>&nbsp; </p>
</body>
</html>