<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Observation
 *
 * @author Aron Aziz
 */
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
