<?php
require './PHP/Task/ManagerTask.php';
$managerTask = new ManagerTask();
$allTasks = $managerTask->getAll();
if (isset($_GET['delete'])) {
    $managerTask->delete(intval($_GET['delete']));
}

if (!empty($_POST['title']) && isset($_POST['description'])) {
    $newTask = new Task();
    $newTask->setTitle($_POST['title']);
    $newTask->setDescription($_POST['description']);
    if (isset($_POST['important'])) {
        $newTask->setImportant(1);
    } else {
        $newTask->setImportant(0);
    }
    $managerTask->create($newTask);
}
if (!empty($_POST['newTaskTitle'])) {
    $managerTask->edit(intval($_POST['newTaskID']), $_POST['newTaskTitle'], $_POST['newTaskDescription'], $_POST['newTaskImportant']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Todo List</title>
</head>

<body>
    <h1>Todo List</h1>
    <div class="manager">
        <table class="table">
            <thead id="top-tr">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Important</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allTasks as $task) {

                    $removeUrl = '?delete=' . $task->getId();
                    $removeLink = '<a href="' . $removeUrl . '">Delete</a>';
                    echo ('<tr>');
                    echo ('<td>' . $task->getTitle() . '</td>');
                    echo ('<td>' . $task->getDescription() . '</td>');
                    echo ('<td>' . $task->getImportant() . '</td>');
                    echo ('<td class="deleteBtn">' . $removeLink . '</td>');
                    echo ('</tr>');
                }
                ?>

            </tbody>
        </table>
        <div>
            <form action="./index.php" method="POST">
                <div>
                    <label for="Title">Title : </label>
                    <input type="text" name="title" id="title">
                </div>
                <div>
                    <label for="description">Description : </label>
                    <input type="text" name="description" id="description">
                </div>
                <div>
                    <label for="important">Important : </label>
                    <input type="checkbox" name="important" id="important">
                </div>
                <input type="submit" value="ADD">
            </form>
        </div>
    </div>
</body>

</html>