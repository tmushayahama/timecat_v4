<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function task_density($observation, $period){
    $time = $observation->start_time;
    $interval = 0;
    $density = array();
    $tasks = $observation->tasks;
    foreach(array_keys($tasks) as $timestamp){
        if($timestamp >= ($time + $period)){
            $interval++;
            $density[$interval] = 0;
            $time += $period;
        }
        $density[$interval]++;
    }
    return $density;
}

function avg_task_density($density){
    $sum = 0;
    foreach($density as $value){
        $sum+=$value;
    }
    return ($sum*1.0)/(sizeof($density));
}

?>
