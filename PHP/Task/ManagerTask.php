<?php

require './PHP/DBManager.php';
require 'task.php';

class ManagerTask extends DBManager
{
  public function getAll()
  {
    $res = $this->getConnexion()->query('SELECT * FROM task');

    $taskList = [];

    foreach ($res as $task) {
      $newTask = new Task();
      $newTask->setTitle($task['title']);
      $newTask->setID($task['id']);
      $newTask->setDescription($task['description']);
      $newTask->setImportant($task['important']);
      $taskList[] = $newTask;
    }
    return $taskList;
  }
  public function create($task)
  {
    var_dump($task);
    $request = 'INSERT INTO task (title, description, important) VALUE (?, ?, ?)';
    $query = $this->getConnexion()->prepare($request);

    $query->execute([
      $task->getTitle(), $task->getDescription(), $task->getImportant()
    ]);
    header('Location:index.php');
  }

  public function delete($taskID)
  { {
      $request = 'DELETE FROM task WHERE id = ' . $taskID;
      $query = $this->getConnexion()->prepare($request);
      $query->execute();
      header('Location:index.php');
      exit();
    }
  }

  public function edit($taskID, $newTaskTitle, $newTaskDescription, $newTaskImportant)
  {
    $request = 'UPDATE `task` SET `title` = ? , `description` = ?, `important` = ? WHERE id = ' . $taskID;
    $query = $this->getConnexion()->prepare($request);
    $query->execute([$newTaskTitle, $newTaskDescription, $newTaskImportant]);
    header('Location:index.php');
    exit();
  }
}

?>