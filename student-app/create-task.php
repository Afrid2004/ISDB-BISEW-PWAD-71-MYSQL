<?php
include_once("./layouts/Header.php");
include_once("Task-oop.php");
include_once("db_config.php");
$errors = [];
if (isset($_POST['btn_submit'])) {
    $taskName = $_POST['taskname'];
    $taskDesc = $_POST['taskdesc'];
    $taskTime = $_POST['tasktime'];

    if (trim($taskName) == "") {
        $errors["name"] = "Task name can not be empty.";
    }
    if (trim($taskDesc) == "") {
        $errors["desc"] = "Task description can not be empty.";
    }
    if (trim($taskTime) == "") {
        $errors["time"] = "Task time can not be empty.";
    }

    if (!count($errors)) {
        // if no errors then send values into the constructor
        $task = new TASKOOP($taskName, $taskDesc, $taskTime);
        //insert values throw save function
        $success = $task->save();
        echo $success;
        header("location:index.php");
    }
}
?>

<div>
    <div class="continer">
        <div class="w-50 mx-auto py-5">
            <form method="post">
                <h4>Crate Task</h4>
                <div class="mb-3">
                    <input type="text" class="form-control" name="taskname" id="taskname" required placeholder="Enter task name">
                </div>
                <?php echo isset($errors['name']) ?
                    "<div class='mb-3 alert alert-danger py-1'>{$errors['name']}</div>" : "";
                ?>
                <div class="mb-3">
                    <input type="text" class="form-control" name="taskdesc" id="taskdesc" required placeholder="Enter task description">
                </div>
                <?php echo isset($errors['desc']) ?
                    "<div class='mb-3 alert alert-danger py-1'>{$errors['desc']}</div>" : "";
                ?>
                <div class="mb-3">
                    <input type="time" class="form-control" name="tasktime" id="tasktime" required>
                </div>
                <?php echo isset($errors['time']) ?
                    "<div class='mb-3 alert alert-danger py-1'>{$errors['time']}</div>" : "";
                ?>
                <div>
                    <button type="submit" class="btn btn-primary w-100" name="btn_submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>