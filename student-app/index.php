<?php
include_once("layouts/Header.php");
include_once("Task-oop.php");
include_once("db_config.php");
//get all data 
$allTasks = TASKOOP::showAll($_SESSION['id']);
?>

<main>
    <div class="py-5">
        <div>
            <h4>All Data</h4>
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">Sl.</th>
                        <th scope="col">Task name</th>
                        <th scope="col">Tasc Description</th>
                        <th scope="col">Task Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allTasks as $task) {
                        $formattedTime = date('h:i A', strtotime($task->task_time));
                        echo "
                            <tr>
                                <th>{$task->id}</th>
                                <td>{$task->task_name}</td>
                                <td>{$task->task_desc}</td>
                                <td>{$formattedTime}</td>
                                <td><button class='btn btn-warning btn-sm'>Edit</button></td>
                            </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div>
</body>

</html>