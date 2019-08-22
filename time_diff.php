<?php
function diff($oy , $omo ,$od ,$oh , $omi , $os , $ny , $nmo ,$nd ,$nh , $nmi , $ns )
{   
    //caculat the 
    $YearDiff = abs($ny - $oy) ; 
    $MonthDiff = abs($nmo-$omo) ;
    $DayDiff = abs($nd-$od) ; 
    $HourDiff = abs($nh-$oh) ; 
    $MinDiff = abs($nmi - $omi) ; 
    $SecDiff = abs(0 - $os) ;
    //convert to sec 
    //to add later : the days in the month not fixable , some are 29 days other 30 or 31 , here i use only 30 day
    $diff =  $YearDiff*31622400 + $MonthDiff*2592000 + $DayDiff*86400 + $HourDiff*3600 + $MinDiff*60 + $SecDiff ; 
    return $diff ; 
}