<?php

    require_once 'Task.php';
    $task = new Task();
    $task->setAction('to_publish');
    assert($task->getNextStatus() == Task::STATUS_NEW);
    $task->setStatus($task->getNextStatus());
    assert($task->getNextActions() == $task->nextActionsNew);
