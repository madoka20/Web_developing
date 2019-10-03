<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!--Author:Clare-->
    <!--Date:10/3/2019-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Soccer Scoreboard</title>
<style type="text/css">
.odd {
	background: #999;
}

table {
	border: solid 1px #666666;
}

td {
	border-top: solid 1px #666;
	padding: 5px;
}
</style>
</head>

<body>

    <?php 
        echo "<table>";
       
        $opponents=array( 
            $opponent1=array("opponent"=>"St.Vincent","home"=>"Away","j_score"=>3,"o_score"=>1),
            $opponent2=array("opponent"=>"Bridgewater","home"=>"Home","j_score"=>2,"o_score"=>3),
            $opponent3=array("opponent"=>"Centenary","home"=>"Home","j_score"=>2,"o_score"=>0),
            $opponent4=array("opponent"=>"Pitt.-Bradford","home"=>"Away","j_score"=>4,"o_score"=>1),
            $opponent5=array("opponent"=>"King\'s","home"=>"Home","j_score"=>3,"o_score"=>3),
            $opponent6=array("opponent"=>"Lycoming","home"=>"Away","j_score"=>1,"o_score"=>3),
            $opponent7=array("opponent"=>"Drew","home"=>"Away","j_score"=>2,"o_score"=>1),
            $opponent8=array("opponent"=>"Penn St. Altoona","home"=>"Home","j_score"=>0,"o_score"=>2),
            $opponent9=array("opponent"=>"Elizabethtown","home"=>"Home","j_score"=>0,"o_score"=>0),
            $opponent10=array("opponent"=>"Misericordia","home"=>"Home","j_score"=>3,"o_score"=>1),
        );
        $count=count($opponents);
            // echo $count;
            echo "<tr>";
            echo "<th>Opponent</th>";
            echo "<th>Location</th>";
            echo "<th>Juniata Score</th>";
            echo "<th>Opponent Score</th>";
            echo "<th>Result</th>";
            echo "</tr>";
        

            $opp="opponent";
            $home="home";
            $js="j_score";
            $os="o_score";
            $row=0;
            $w=0;
            $l=0;
            $t=0;
            $streak=0;
            $maxStr=0;
            foreach($opponents as $opps){
                $res="";
                if($opps[$js]>$opps[$os]){
                    $res="W";
                    $w+=1;
                    $streak+=1;
                    if($streak>$maxStr){
                        $maxStr=$streak;
                    }
                }
                else if($opps[$js]<$opps[$os]){
                    $res="L";
                    $l+=1;
                    $streak=0;
                }
                else{
                    $res="T";
                    $t+=1;
                    $streak=0;
                }
                if($row%2==0){ echo "<tr class='odd'>";}
                if($row%2==1){ echo "<tr>";}
                echo "<td>$opps[$opp]</td>";
                echo "<td>$opps[$home]</td>";
                echo "<td>$opps[$js]</td>";
                echo "<td>$opps[$os]</td>";
                echo "<td>$res</td>";
                echo "</tr>";
                $row+=1;
                
            }
        echo "</table>";
        echo "<p>Record: {$w}-{$l}-{$t}</p>";
        echo "<p>Longest Win Streak: $maxStr</p>";
    ?>
 
</body>
</html>