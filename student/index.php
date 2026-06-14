<?php
include_once("db_config.php");
include_once("Student.php");

$allData = Student::showAll();


// get the deleted data id
if (isset($_GET['del_id'])) {
    $delId = intval($_GET['del_id']);
    $deleted = Student::deleteData($delId);
    header("location:index.php");
    exit;
}

//search data
$searchData=null;
if (isset($_POST['btn_search'])) {
    $searchId = intval(trim($_POST['search']));
    $searchData = Student::findData($searchId);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student</title>
</head>

<body>
    <div class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="bg-white rounded-4 p-4 shadow-sm overflow-x-auto">
                        <div class="mb-4 d-flex align-items-center justify-content-between">
                            <h4>All Students</h4>
                            <a href="create.php" class="btn btn-sm btn-success">Create New</a>
                        </div>

                        <table class="table table-striped border">
                            <thead>
                                <tr>
                                    <th scope="col">Sl.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">CGPA</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($allData as $values) {
                                    $data = (object) $values;
                                    echo "
                                         <tr>
                                            <th scope='row'>{$data->id}</th>
                                            <td>{$data->name}</td>
                                            <td>{$data->email}</td>
                                            <td>{$data->department}</td>
                                            <td>{$data->cgpa}</td>
                                            <td>
                                                <div class='d-flex align-items-center gap-2'>
                                                    <a href='update.php?id={$data->id}' class='btn btn-sm btn-success'>Update</a>
                                                    <a href='index.php?del_id={$data->id}' class='btn btn-sm btn-dark'>Delete</a>
                                                <div>
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
                    <div class="bg-white rounded-4 p-4 shadow-sm">
                        <h4 class="mb-3">Search data</h4>
                        <div>
                            <form method="post">
                                <div class="d-flex align-items-center justify-content-center gap-2">
                                    <input type="number" name="search" id="search" placeholder="Search id" required class="form-control">
                                    <button class="btn btn-dark" name="btn_search">Search</button>
                                </div>
                            </form>
                        </div>

                        <div>
                            <?php if ($searchData) { ?>
                                <ul class="list-group mt-3">
                                    <li class="list-group-item">
                                        <strong>ID:</strong> <?= $searchData->id ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Name:</strong> <?= $searchData->name ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Email:</strong> <?= $searchData->email ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>Department:</strong> <?= $searchData->department ?>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>CGPA:</strong> <?= $searchData->cgpa ?>
                                    </li>
                                </ul>
                            <?php } elseif (isset($_POST['btn_search'])) { ?>
                                <div class="alert alert-warning py-2 mt-3 mb-0">
                                    No data found
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>