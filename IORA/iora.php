<?php

$idA = 214;
$idZ = 215;

$iora_sql = new IORA_SQL();

$observationA = $iora_sql->query_tasks($idA);
$observationZ = $iora_sql->query_tasks($idZ); 

echo iora_kappa($observationA, $observationZ);

echo iora_avg_task_density(iora_task_density($observationA, 10));

function iora_kappa($observationA, $observationZ){
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

function iora_task_density($observation, $period){
    $time = $observation->start_time;
    $interval = 0;
    $density = array();
    $tasks = $observation->tasks;
    foreach(array_keys($tasks) as $timestamp){
        if($timestamp >= ($time + $period)){
            $interval++;
            $density[$interval] = 0;
        }
        $density[$interval]++;
    }
    return $density;
}

function iora_avg_task_density($density){
    $sum = 0;
    foreach($density as $value){
        $sum+=$value;
    }
    return ($sum*1.0)/(sizeof($density));
}

class IORA_SQL {

    public static $host = "localhost";
    public static $username = "";
    public static $password = "";
    public static $database_name = "test";
    public static $port = 3306;
    public static $socket = "";
    public static $tc_observation_tasks = "task";
    public static $observation_id = "idtc5";
    public static $task_name = "idt";
    public static $start_time = "timeon";
    public $link;

    function IORA_SQL() {
        $this->link = new mysqli(IORA_SQL::$host, IORA_SQL::$username, IORA_SQL::$password, IORA_SQL::$database_name, IORA_SQL::$port, IORA_SQL::$socket);
    }

    function query_tasks($observation_id) {
        $result = $this->link->query("SELECT " . IORA_SQL::$task_name . ", " . IORA_SQL::$start_time . " FROM " . IORA_SQL::$tc_observation_tasks . " WHERE " . IORA_SQL::$observation_id . " = '" . $observation_id . "'");
//        '".IORA_SQL::$task_name.", ".IORA_SQL::$start_time."'
        $taskTable = array();
        while ($row = $result->fetch_assoc()) {
            $taskTable[] = $row;
        }
//        print $taskTable[2]['idt'];
        $tasks = array();
        $seconds = array();
        $taskTableSize = sizeof($taskTable);
        for ($i = 0; $i < $taskTableSize - 1; $i++) {
            $tasks[$taskTable[$i][IORA_SQL::$start_time]] = $taskTable[$i][IORA_SQL::$task_name];
            $diff = $taskTable[$i + 1][IORA_SQL::$start_time] - $taskTable[$i][IORA_SQL::$start_time];
            for ($j = 0; $j < $diff; $j++) {
                $seconds[] = $taskTable[$i][IORA_SQL::$task_name];
            }
        }
        $seconds[] = $taskTable[$taskTableSize - 1][IORA_SQL::$task_name];

        return new Observation($taskTable[0][IORA_SQL::$start_time], $taskTable[$taskTableSize - 1][IORA_SQL::$start_time] - $taskTable[0][IORA_SQL::$start_time], $seconds, $tasks);
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

?>