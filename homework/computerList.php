<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        table{
            text-align:center;
            margin-top:10px;
            margin-bottom:10px;
        }
        .grey{
            background-color: rgb(243,243,243);
        }
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
    <?php
    echo "<table class=\"table-bordered table-hover\">";
    $comps=array(
    $c1=array("C02P20DN","Apple","15\" MacBook Pro","2015","Yes"),
    $c2=array("FSVMJ72J","Dell","Latitude E7470","2016","Yes"),
    $c3=array("A2E9TQ34","Apple","iPhone11","2019","No"),
    $c4=array("ER1A1K3L","Dell","Latitude E5570","2016","Yes"),
    $c5=array("44XJGY2M","Apple","iPhone20","2027","No"),
    $c6=array("W1PMNCCV","Apple","iPhone99","2100","No"),
    $c7=array("5B741WAA","Apple","27\" iMac","2015","No"),
    $c8=array("3648P1SG","Dell","13\" MacBook Pro","2013","Yes")
    );
    echo "<tr>";
    echo "<th>Serial Number</th>";
    echo "<th>Manufacturer</th>";
    echo "<th>Model</th>";
    echo "<th>Purchase Year</th>";
    echo "<th>Laptop</th>";
    echo "</tr>";
    $appleCount=0;
    $dellCount=0;
    foreach($comps as $comp){
        if($comp[4]!="Yes"){
            echo "<tr class=\"grey\">";
        }else{
          echo "<tr>";  
        }
        
        echo "<td>$comp[0]</td>";
        echo "<td>$comp[1]</td>";
        echo "<td>$comp[2]</td>";
        echo "<td>$comp[3]</td>";
        echo "<td>$comp[4]</td>";
        echo "</tr>";
        if($comp[1]=="Apple"){
            $appleCount+=1;
        }
        if($comp[1]=="Dell"){
            $dellCount+=1;
        }
        
        
    }
    
    
    echo "</table>";
    echo "Total Apple: {$appleCount} <br>";
    echo "Total Dell: {$dellCount}";
    
    ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>