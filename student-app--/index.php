<?php
include_once("layouts/Header.php");
include_once("Task-oop.php");
include_once("db_config.php");
//get all data 
$allTasks = TASKOOP::showAll($_SESSION['id']);

//find tasks
$result = [];
if (isset($_POST['btn_search'])) {
    $value = trim($_POST['search']);
    $result = TASKOOP::findValue($value, $_SESSION['id']);
}

if(isset($_GET['id'])){
    $delId = $_GET['id'];
}
?>

<main>
    <div class="py-5">
        <div class="row">
            <div class="col-lg-8">
                <h4 class="mb-3">All Data</h4>
                <div class="table-responsive">
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
                                <td class='d-flex gap-2 h-100'>
                                    <a href='update-task.php?id={$task->id}' class='btn btn-dark btn-sm'>Edit</a>
                                    <a href='index.php?id={$task->id}' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>
                        ";
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div>
                    <h4 class="mb-3">Find Task</h4>
                    <form method="post">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <input class="form-control" type="text" name="search" id="search" placeholder="Serch Tasks" required>
                            <button class="btn btn-dark" name="btn_search">Search</button>
                        </div>
                    </form>
                    <div>
                        <?php if (isset($_POST['btn_search'])) {
                            if (count($result) > 0) {
                                foreach ($result as  $value) {
                                    $formattedTime = date('h:i A', strtotime($value['task_time']));
                                    echo "
                                            <ul class='list-group mb-3'>
                                            <li class='list-group-item'>
                                                <strong>Task name:</strong> {$value['task_name']}
                                            </li>
                                            <li class='list-group-item'>
                                                <strong>Task description:</strong> {$value['task_desc']}
                                            </li>
                                            <li class='list-group-item'>
                                                <strong>Task time:</strong> {$formattedTime}
                                            </li>
                                                                        </ul>
                                            ";
                                };
                            } else {
                                echo "<ul class='list-group'><li class='list-group-item'>
                                                No data found!
                                            </li></ul>";
                            }
                        } else {
                            echo "";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</body>

</html>