<!DOCTYPE html>
<html lang="en">
<!-- Author:Clare -->
<!-- Last Modified:9/26/19 -->

<head>
    <meta charset="UTF-8">
    <title>Update Device</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>

<body>
    <nav class="navbar navbar-light bg-light navbar-expand-sm">
        <div class="container">
            <div class="navbar-brand" href="#">CTS Computer Inventory</div>
            <div class="navbar-nav">
                <div class="dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" id="devices" aria-haspopup="true" aira-expanded="false">Devices</a>
                    <div class="dropdown-menu" aria-labelledby="devices">
                        <a target="_blank" href="list.php" class="dropdown-item">List</a>
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
        <h2 style="text-align: center;">Update Device</h2>

        <form action="process_update.php" method="post">

      
        <!-- radio buttons to toggle -->
        <div class="form-group row"><label class="form-control-label col-sm-3" id="tag" style="display:block;">Service Tag:
                <input readonly class="form-control" type="text" name="servicetag" value="<?php echo $_GET['servicetag']; ?>" ></label>
  
        </div>
        <!-- service tag / multiple service tags -->
        <div class="form-group row">
            <label class="form-control-label col-sm-3" id="model">Model:
                <input class="form-control" value="<?php echo $_GET['model']; ?>" type="text" name="model"></label>
        </div>
        <!-- model -->
        <div class="form-group row">
            <label class="col-sm-3">Type:
                <select class="custom-select" name="type" >
                    <option selected value="<?php echo $_GET['type']; ?>"><?php echo $_GET['type']; ?></option>
                    <option value="laptop">laptop</option>
                    <option value="desktop">desktop</option>
                    <option value="tablet">tablet</option>
                    <option value="other">other</option>
                </select></label>
        </div>
        <!-- type -->
        <div class="form-group row">
            <label class="form-control-label col-sm-3">Purchase Date:
                <input class="form-control"  value="<?php echo $_GET['purchasedate']; ?>" placeholder="MM/DD/YYYY" type="text" name="pdate"/></label>
        </div>
        <!-- purchase date -->
        <div class="form-group row">
            <label class="form-control-label col-sm-3" id="warPro">Warranty Provider:
                <input value="<?php echo $_GET['warrantyprovider']; ?>" class=" form-control" type="text" name="wpro"></label>
        </div>
        <!-- warranty provider -->
        <div class="form-group row">
            <label class="form-control-label col-sm-3">Warranty Expiration:
                <input value="<?php echo $_GET['warrantyexp']; ?>" class="form-control" placeholder="MM/DD/YYYY" type="text" name="wdate" /></label>
        </div>
        <!-- warranty expiration -->
        <div class="form-group row">
            <label class="form-check-label col-sm-3">
                Retired
                <div class="form-check form-check-inline">
                    <input value="<?php echo $_GET['retired']; ?>" type="checkbox" class="form-check-input" name="retired" >
                </div>
            </label>
        </div>
        <!-- retired -->
        <div class="form-group row">
            <div class="col-sm-2">
                <button class="btn btn-primary" type="submit" >Submit</button>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-danger" onclick="cfm()">Cancel</button>
            </div>
        </div>


        </form>
        <!-- submit and cancel button -->
    </div>
    <script>
    function cfm() {

        var ans = confirm("Are you sure to leave this page? Your input will no longer saved.");
        if (ans == true) {
            window.location.href = 'list.php';
        }

    }
    // confirmation
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>