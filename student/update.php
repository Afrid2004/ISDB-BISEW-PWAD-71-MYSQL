<?php
include_once("db_config.php");
include_once("Student.php");

//return to home if  the id from query does not exist
if (!isset($_GET['id'])) {
    header("location:index.php");
    exit;
}
//get the id from query
$queryId = intval($_GET['id']);
$foundedData = Student::findData($queryId);


if (isset($_POST['btn_submit'])) {
    $queryId = intval($_GET['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $department = trim($_POST['department']);
    $cgpa = floatval(trim($_POST['cgpa']));
    //pass updated data to constructor
    $student = new Student($name, $email, $department, $cgpa);
    $student->updateData($queryId);
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
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4>Update student data</h4>
                        <a href="index.php" class="btn btn-sm btn-success">Back to Home</a>
                    </div>
                    <form method="post">
                        <div class="mb-3">
                            <input value="<?php echo $foundedData->name; ?>" type="text" name="name" id="name" class="form-control" required placeholder="Enter student name">
                        </div>
                        <div class="mb-3">
                            <input value="<?php echo $foundedData->email; ?>" type="email" name="email" id="email" class="form-control" required placeholder="Enter student email">
                        </div>
                        <div class="mb-3">
                            <select name="department" class="form-select" id="department">
                                <option value="" selected disabled>Select Department</option>
                                <option <?php if ($foundedData->department == "CSE") echo "selected"; ?> value="CSE">CSE</option>
                                <option <?php if ($foundedData->department == "SWE") echo "selected"; ?> value="SWE">SWE</option>
                                <option <?php if ($foundedData->department == "EEE") echo "selected"; ?> value="EEE">EEE</option>
                                <option <?php if ($foundedData->department == "CE") echo "selected"; ?> value="CE">CE</option>
                                <option <?php if ($foundedData->department == "ME") echo "selected"; ?> value="ME">ME</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input value="<?php echo $foundedData->cgpa; ?>" type="text" name="cgpa" id="cgpa" required placeholder="Enter CGPA" class="form-control">
                        </div>
                        <button class="btn btn-success w-100" name="btn_submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>