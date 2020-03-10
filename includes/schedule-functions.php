<?php

    function getDates($date){
//        echo " Date: $date ";
        
        
        $time = strtotime($date);
        
//        echo " Time: $time ";
        
        $weekday = date('w', $time);
//        echo " Weekday: $weekday ";
        
        $sundayTime = mktime(0, 0, 0, date("m", $time)  , date("d", $time)-$weekday, date("Y", $time));
        
//        echo " Sunday Time: $sundayTime ";
        
        $sundayDate = date('d-m-Y',$sundayTime);
        
//        echo " Sunday Date: $sundayDate ";
        
        $dates["Sunday"] = $sundayDate;
        $dates["Monday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+1, date("Y", $sundayTime)));
        $dates["Tuesday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+2, date("Y", $sundayTime)));
        $dates["Wednesday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+3, date("Y", $sundayTime)));
        $dates["Thursday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+4, date("Y", $sundayTime)));
        $dates["Friday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+5, date("Y", $sundayTime)));
        $dates["Saturday"] = date('d-m-Y',mktime(0, 0, 0, date("m", $sundayTime)  , date("d", $sundayTime)+6, date("Y", $sundayTime)));
        
//        var_dump($dates);
        return $dates;
    }

    function getPreviousWeek($date){
        $time = strtotime($date);
        
//        echo " Time: $time ";
        
//        $weekday = date('w', $time);
//        echo " Weekday: $weekday ";
        
        $prevWeekDayTime = mktime(0, 0, 0, date("m", $time)  , date("d", $time)-7, date("Y", $time));
        $prevWeekDayDate = date('d-m-Y',$prevWeekDayTime);
        
        
//                echo " Prev Date: $prevWeekDayDate ";
        
        return $prevWeekDayDate;
    }

    function getNextWeek($date){
        $time = strtotime($date);
        
//        echo " Time: $time ";
        
//        $weekday = date('w', $time);
//        echo " Weekday: $weekday ";
        
        $nextWeekDayTime = mktime(0, 0, 0, date("m", $time)  , date("d", $time)+7, date("Y", $time));
        $nextWeekDayDate = date('d-m-Y',$nextWeekDayTime);
        
//        echo " Next Date: $nextWeekDayDate ";
        
        return $nextWeekDayDate;
    }


    function getAmericanFormat($date){
        $time = strtotime($date);

        $american = date('Y-m-d',$time);
        
        return $american;
    }



?>