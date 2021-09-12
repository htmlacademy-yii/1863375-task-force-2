<?php

    require_once 'Task.php';
    $task = new Task();
    $task->setAction('to_publish');
    assert($task->getNextStatus() == Task::STATUS_NEW, 'not true');
    $task->setStatus($task->getNextStatus());
    assert($task->getNextActions() == $task->next_actions_new, 'wrong');
