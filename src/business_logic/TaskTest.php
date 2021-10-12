<?php
    require_once "../../vendor/autoload.php";
   // use TaskForce\Task;
    $task = new TaskForce\business_logic\Task();
    $task->setAction('choose_a_performer');
    assert($task->getNextStatus() == TaskForce\business_logic\Task::STATUS_IN_WORK);
    $task->setStatus($task->getNextStatus());
    assert($task->getNextActions() == $task->nextActionsWork);
