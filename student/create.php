<?php 
include_once("db_config.php");
include_once("Student.php");
if(isset($_POST['btn_submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $cgpa = floatval(trim($_POST['cgpa']));
    //pass data to constructor
    $student = new Student($name, $email, $department, $cgpa);
    $student->saveData();
    header('location:index.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create</title>
</head>

<body>
    <div class="bg-light">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="mx-auto w-50 bg-white p-4 rounded-4 shadow-sm">
                    <h4 class="text-center mb-4">Create student data</h4>
                    <form method="post">
                        <div class="mb-3">
                            <input type="text" name="name" id="name" class="form-control" required placeholder="Enter student name">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control" required placeholder="Enter student email">
                        </div>
                        <div class="mb-3">
                            <select name="department" class="form-select" id="department">
                                <option value="" selected disabled>Select Department</option>
                                <option value="CSE">CSE</option>
                                <option value="SWE">SWE</option>
                                <option value="EEE">EEE</option>
                                <option value="CE">CE</option>
                                <option value="ME">ME</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="cgpa" id="cgpa" required placeholder="Enter CGPA" class="form-control">
                        </div>
                        <button class="btn btn-success w-100" name="btn_submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>