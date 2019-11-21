<!DOCTYPE html>
<html lang="en">
<!-- Author:Clare Date:9/12/19 -->
<?php 
include "function.php";
$username=loggedIn();
$conn=db_connect();
$getmnglevel="select manager from users where username='$username'";
$result=$conn->query($getmnglevel) or die($conn->error);
$row=$result->fetch_assoc();

$mnglevel= $row['manager'];


?>
<head>
    <meta charset="UTF-8">
    <title>Computer List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <style>
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light navbar-expand-sm">
        <div class="container">
            <div class="navbar-brand" href="#">CTS Computer Inventory</div>
            <div class="navbar-nav">
                <div class="dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" id="devices" aria-haspopup="true" aira-expanded="false">Devices</a>
                    <div class="dropdown-menu" aria-labelledby="devices">
                        <a href="#" class="dropdown-item">List</a>
                        <a href="form.php" class="dropdown-item">Add Device</a>
                        <a href="list_retired.php" class="dropdown-item">Retired Devices</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" id="reports" aria-haspopup="true" aira-expanded="false">Reports</a>
                    <div class="dropdown-menu" aria-labelledby="reports">
                        <a href="#" class="dropdown-item">Report 1</a>
                        <a href="#" class="dropdown-item">Report 2</a>
                        <a href="#" class="dropdown-item">Report 3</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php echo "Welcome, ".$username."! ";
        echo " | ";
        if($mnglevel==0){
    echo "you are not a manager.";
}

if($mnglevel==1){
    echo "<a href='manage.php'>Manage users</a>";
}
echo " | ";
echo "<a href='ch_pw_user.php'>Change password</a>";
echo " | ";
echo "<a href='login.php'>Log out</a>";
         ?>

          <h2 align="center">Current Devices</h2>
            <table class="table table-light table-hover table-bordered" style="table-layout: fixed; margin-top: 20px;">
                <thead>
                    <tr style="text-align: center;">
                        <th>Service Tag</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Purchase Date</th>
                        <th>Warranty Provider</th>
                        <th>Warranty Expiration</th>

                        
                        <th>Assigned User</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>Assign</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                
                
                $sql="select servicetag,model,type,purchasedate,warrantyprovider,warrantyexp,retired from devices where retired=0";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                 ?>
                    <?php 
                         if((time()-$row["purchasedate"])>94867200&&(time()-$row["purchasedate"])<189734400){
                                     echo "<tr style='background-color:#ffffe0;'>";
                                }
                               else if((time()-$row["purchasedate"])>189734400){
                                     echo "<tr style='background-color:#ffcccb;'>";
                                }else{
                                    echo "<tr>";
                                }
                    ?>

                 
                        <td>
                            <?php echo $row["servicetag"];?>
                        </td>
                        <td>
                            <?php echo $row["model"]; ?>
                        </td>
                        <td>
                            <?php echo $row["type"]; ?>
                        </td>
                        <td>
                            <?php echo date("Y-m-d", $row["purchasedate"]);
                               

                             ?>
                        </td>
                        <td>
                            <?php echo $row["warrantyprovider"]; ?>
                        </td>
                        <td>
                            <?php echo date("Y-m-d", $row["warrantyexp"]); ?>
                        </td>
                        
                        <td></td>
                        <td>
                            <a href="form_update.php?servicetag=<?php echo $row["servicetag"];?>&model=<?php echo $row["model"]; ?>&type= <?php echo $row["type"]; ?>&purchasedate=<?php echo date("Y-m-d", $row["purchasedate"]); ?>&warrantyprovider=<?php echo $row["warrantyprovider"]; ?>&warrantyexp=<?php echo date("Y-m-d", $row["warrantyexp"]); ?>&retired= <?php echo $row["retired"]; ?>" >Update</a>
                        </td>
                        <td>
                            <a href="list.php?servicetag=<?php echo $row["servicetag"];?>"  onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                        <td><a href="assignments.php?servicetag=<?php echo $row["servicetag"];?>">Assign</a></td>
                    </tr>
                    <?php              
    }
        
}else{
    echo "<br>0 results";
}

                ?>
                </tbody>
            </table>
       
    </div>
    <script>
        
       
            <?php $stmt2=$conn->prepare("delete from devices where servicetag=?");
                            $value1=$_GET["servicetag"];
                            $stmt2->bind_param("s",$value1);
                            $stmt2->execute();
                            $stmt2->close();
                         echo "window.location.replace('list.php');"

                                ?>
        
          
        
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


</html>