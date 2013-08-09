<?php

function iora_main($study_id){
    $iora_sql = new IORA_SQL();
    $pairs = $iora_sql->get_comparable_observations($study_id);
    
    //arbitrarily gets the ids for the first pair returned
    $idA = $pairs[0][0];
    $idZ = $pairs[0][1];

    //gets the manipulatable Observation object (see below) from the id
    $observationA = $iora_sql->query_tasks($idA);
    $observationZ = $iora_sql->query_tasks($idZ); 

    //calls iora functions
    echo persistence_agreement($observationA, $observationZ);
    echo avg_task_density(task_density($observationA, 10));
}


function get_comparable_observations($study_id){
    $iora_sql = new IORA_SQL();
    return $iora_sql->get_comparable_observations($study_id);
}

function get_observation($observation_id){
    $iora_sql = new IORA_SQL();
    return $iora_sql->query_tasks($observation_id);
}


function persistence_agreement($observationA, $observationZ){
    $matching_seconds = 0;
    $total_seconds = 0;
    $offset = $observationZ->start_time - $observationA->start_time;
    for ($i = 0; $i + $offset < $observationA->duration && $i < $observationZ->duration; $i++) {
        if ($observationA->seconds[$i + $offset] == $observationZ->seconds[$i]) {
            $matching_seconds++;
        }
        $total_seconds++;
    }

    $match_fraction = ($matching_seconds * 1.0) / ($total_seconds * 1.0) * 100;

    return $match_fraction;
}

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

class IORA_SQL {

    public $link;

    function IORA_SQL() {
        $this->link = new mysqli(Metadata::$host, Metadata::$username, Metadata::$password, Metadata::$database_name, Metadata::$port, Metadata::$socket);
    }

    function get_comparable_observations($study_id) {
        $result = $this->link->query("SELECT " . "*" . " FROM " . Metadata::$tc_observations . " WHERE " . Metadata::$observation_study_id . " = '" . $study_id . "' AND " . Metadata::$observation_type_id . " = '" . Metadata::$type_iora . "'");
        $observations = array();
        while ($row = $result->fetch_assoc()) {
            $observations[] = $row;
        }
        
        $validPairs = array();
        
        foreach ($observations as $observationA) {
            foreach ($observations as $observationB) {
                if ($observationA != $observationB) {
                    //if B started at the same time as or after A started 
                    // AND A ended after B started
                    if ($observationA[Metadata::$observation_site_id] == $observationB[Metadata::$observation_site_id]
                            && $observationB[Metadata::$observation_start_time] >= $observationA[Metadata::$observation_start_time] 
                            && ($observationA[Metadata::$observation_start_time] + $observationA[Metadata::$observation_duration]) 
                                > $observationB[Metadata::$observation_start_time]
                        ) {
                        $validPairs[] = array($observationA[Metadata::$tc_observations_id], $observationB[Metadata::$tc_observations_id]);
                    }
                }
            }
        }
        
        return $validPairs;
        
    }

    function query_tasks($observation_id) {
        $result = $this->link->query("SELECT " . Metadata::$task_id . ", " . Metadata::$start_time . " FROM " . Metadata::$tc_observation_tasks . " WHERE " . Metadata::$observation_id . " = '" . $observation_id . "'");
//        '".Metadata::$task_name.", ".Metadata::$start_time."'
        $taskTable = array();
        while ($row = $result->fetch_assoc()) {
            $taskTable[] = $row;
        }
//        print $taskTable[2]['idt'];
        $tasks = array();
        $seconds = array();
        $taskTableSize = sizeof($taskTable);
        for ($i = 0; $i < $taskTableSize - 1; $i++) {
            $tasks[$taskTable[$i][Metadata::$start_time]] = $taskTable[$i][Metadata::$task_id];
            $diff = $taskTable[$i + 1][Metadata::$start_time] - $taskTable[$i][Metadata::$start_time];
            for ($j = 0; $j < $diff; $j++) {
                $seconds[] = $taskTable[$i][Metadata::$task_id];
            }
        }
        $seconds[] = $taskTable[$taskTableSize - 1][Metadata::$task_id];

        return new Observation($taskTable[0][Metadata::$start_time], $taskTable[$taskTableSize - 1][Metadata::$start_time] - $taskTable[0][Metadata::$start_time], $seconds, $tasks);
    }

}

class Observation {

    public $start_time;
    public $end_time;
    public $duration;
    public $seconds;
    public $tasks;

    public function Observation($start_time, $duration, $seconds, $tasks) {
        $this->start_time = $start_time;
        $this->duration = $duration;
        $this->end_time = $this->start_time + $this->duration;
        $this->seconds = $seconds;
        $this->tasks = $tasks;
    }

}

class Metadata {

    public static $host = "timecat.bmi.osumc.edu";
    public static $username = "cheloptc4";
    public static $password = "723MwiJf7m2xaZ$2#BNR";
    public static $database_name = "timecat4";
    public static $port = 22;
    public static $socket = "";
    //for Observation_Tasks table
    public static $tc_observation_tasks = "maindata";
    public static $observation_id = "obs_id";
    public static $task_id = "task_id";
    public static $start_time = "start";
    //for Observations table
    public static $tc_observations = "observations";
    public static $tc_observations_id = "id";
    public static $observation_study_id = "study_id";
    public static $observation_user_id = "user_id";
    public static $observation_site_id = "site_id";
    public static $observation_start_time = "begin";
    public static $observation_duration = "duration";
    public static $observation_type_id = "type_id";
    public static $type_iora = 3;

}


?>