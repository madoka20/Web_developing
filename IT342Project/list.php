<!DOCTYPE html>
<html lang="en">
<!-- Author:Clare Date:9/12/19 -->

<head>
    <meta charset="UTF-8">
    <title>BootstrapTable</title>
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
                        <a target="_blank" href="form.html" class="dropdown-item">Add Device</a>
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
       
            <table class="table table-light table-hover table-bordered" style="table-layout: fixed; margin-top: 20px;">
                <thead>
                    <tr style="text-align: center;">
                        <th>Service Tag</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Purchase Date</th>
                        <th>Warranty Provider</th>
                        <th>Warranty Expiration</th>
                        <th>Retired</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include "function.php";
                $conn=db_connect();
                $sql="select servicetag,model,type,purchasedate,warrantyprovider,warrantyexp,retired from devices";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                 ?>
                    <tr>
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
                            <?php echo date("Y-m-d", $row["purchasedate"]); ?>
                        </td>
                        <td>
                            <?php echo $row["warrantyprovider"]; ?>
                        </td>
                        <td>
                            <?php echo date("Y-m-d", $row["warrantyexp"]); ?>
                        </td>
                        <td>
                            <?php echo $row["retired"]; ?>
                        </td>
                        <td>
                            <a target="_blank" href="form_update.php?servicetag=<?php echo $row["servicetag"];?>" >Update</a>
                        </td>
                        <td>
                            <a href="list.php?servicetag=<?php echo $row["servicetag"];?>"  onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
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
                         

                                ?>
        
          
        
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>


</html>