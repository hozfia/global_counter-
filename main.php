<?php
require "so.php" ;
require "time_diff.php" ; 
$user_date = preg_split("/[\/]+/", $_POST["date"]) ;
$user_time =  preg_split("/[:]+/", $_POST["time"]) ;
$obj = new api_time\api ; 
$obj->time_parsing() ; 
$obj->date_parsing() ; 
$SecDiff = diff(
                    $obj->date_arry["year"],
                    $obj->date_arry["month"],
                    $obj->date_arry["day"],
                    $obj->time_arry["H"],
                    $obj->time_arry["M"],
                    $obj->time_arry["S"],
                    $user_date[2], //year
                    $user_date[1], //month
                    $user_date[0], //day
                    $user_time[0], //hour
                    $user_time[1], //minute
                    $user_time[2]  //sec
                ) ; 
print_r(  $user_date) ; 
echo $SecDiff ;  
