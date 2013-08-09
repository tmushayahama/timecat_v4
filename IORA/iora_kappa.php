<?php

function persistence_agreement($observationA, $observationZ) {
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

?>