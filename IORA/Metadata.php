<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Aron Aziz
 */
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
