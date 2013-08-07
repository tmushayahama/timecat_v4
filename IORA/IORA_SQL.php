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
        $seconds = array();
        $taskTableSize = sizeof($taskTable);
        for ($i = 0; $i < $taskTableSize - 1; $i++) {
            $diff = $taskTable[$i + 1][IORA_SQL::$start_time] - $taskTable[$i][IORA_SQL::$start_time];
            for ($j = 0; $j < $diff; $j++) {
                $seconds[] = $taskTable[$i][IORA_SQL::$task_name];
            }
        }
        $seconds[] = $taskTable[$taskTableSize - 1][IORA_SQL::$task_name];

        return new Observation($taskTable[0][IORA_SQL::$start_time], $taskTable[$taskTableSize - 1][IORA_SQL::$start_time] - $taskTable[0][IORA_SQL::$start_time], $seconds);
    }

}

?>
