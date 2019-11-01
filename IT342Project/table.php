<!DOCTYPE html>
<html lang="en">
<!-- Author:Clare Date:9/12/19 -->

<head>
    <meta charset="UTF-8">
    <title>BootstrapTable</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                        <a href="#" class="dropdown-item">Add Device</a>
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
        <form action="process.php">
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
                            <?php echo $row["purchasedate"]; ?>
                        </td>
                        <td>
                            <?php echo $row["warrantyprovider"]; ?>
                        </td>
                        <td>
                            <?php echo $row["warrantyexp"]; ?>
                        </td>
                        <td>
                            <?php echo $row["retired"]; ?>
                        </td>
                    </tr>
                    <?php              
    }
        
}else{
    echo "0 results";
}

                ?>
                </tbody>
            </table>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>