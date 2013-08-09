<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IORA_SQL
 *
 * @author Aron Aziz
 */
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
                    if ($observationB[Metadata::$observation_start_time] >= $observationA[Metadata::$observation_start_time] 
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

?>
