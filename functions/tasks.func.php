<?php

//dont' know if we will need this

function isAnythingEmpty($taskName, $taskDesc, $taskPriority, $taskDev, $taskDueDate) {
    if(empty($taskName) || empty($taskDesc) || empty($taskPriority) || empty($taskDev) || empty($taskDueDate) ) {
        return true;
    }

    return false;
}

function isEmpty($field) {
    if(empty($field)) {
        return true;
    }

    return false;
}