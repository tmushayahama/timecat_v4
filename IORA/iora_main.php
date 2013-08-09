<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function iora_main($study_id) {
    $iora_sql = new IORA_SQL();

    $pairs = $iora_sql->get_comparable_observations($study_id);

    $idA = $pairs[0][0];
    $idZ = $pairs[0][1];

    $observationA = $iora_sql->query_tasks($idA);
    $observationZ = $iora_sql->query_tasks($idZ);

    echo persistence_agreement($observationA, $observationZ);

    echo avg_task_density(task_density($observationA, 10));
}

?>
