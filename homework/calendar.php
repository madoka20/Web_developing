<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        td{
            border:1px solid black;
        }
    </style>
</head>
<body>
    <?php 
    function showCalendar($month=10,$year=2019){
        echo "<h4>$month/$year</h4>";
        $d=(cal_days_in_month(CAL_GREGORIAN,$month,$year));
        $firstDay=date('w',strtotime(Date("$year-$month-1")));
        $dateArray=array();
        for($j=1;$j<=$firstDay;$j++){
            array_push($dateArray,'');
        }
        for($i=1;$i<=$d;$i++){
            array_push($dateArray,$i);
        }
        while(count($dateArray)<35){
            array_push($dateArray,'');
        }
        echo '<table>';
        echo '<tr>';
        echo '<td>S</td>';
        echo '<td>M</td>';
        echo '<td>T</td>';
        echo '<td>W</td>';
        echo '<td>T</td>';
        echo '<td>F</td>';
        echo '<td>S</td>';
        echo '</tr>';
        for($k=0;$k<count($dateArray);$k++){
            if($k%7!=0){
                 echo "<td>$dateArray[$k]</td>"; 
            }
         
            if($k%7==0){
               echo "<tr><td>$dateArray[$k]</td>"; 
            }
            
        }
        echo '</table>';
        echo '<br>';
      
    }
    showCalendar();
    showCalendar(11,2019);
    showCalendar(12,2019);
    showCalendar(1,2020);
    ?>
    
</body>
</html>