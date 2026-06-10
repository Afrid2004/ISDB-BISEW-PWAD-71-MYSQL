<?php
session_start();
//if user already logged in then no need to login
if (isset($_SESSION["id"])) {
    header("location:../");
    exit();
}

// else import the db coneection from db_config.php
require_once("../db_config.php");
$error = "";
if (isset($_POST["btn_submit"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    //get the name and password in db, which data inserted from user login from
    $stmt = $db->query("SELECT * FROM users WHERE name='$name' AND password='$password'");
    //fetch the user data 
    $user = $stmt->fetch_object();

    // check weather user exist or not
    if (isset($user->name)) {
        // set the name in session
        $_SESSION["name"] = $user->name;
        $_SESSION["id"] = $user->id;
        // if user exist then go to home page
        header("location:../");
    } else {
        $error = "Incorrect name or password";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>

<body>
    <div>
        <div class="container">
            <div class="d-flex align-items-center justify-content-center py-5">
                <div class="w-50 mx-auto bg-light p-3">
                    <h3>Login</h3>
                    <p class="text-danger">
                        <?php echo isset($error) ? $error : ""; ?>
                    </p>
                    <form method="post">
                        <div class="mb-3">
                            <input value="<?php echo isset($name) ? $name : ""; ?>" type="text" class="form-control" name="name" id="name" required placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" id="password" required placeholder="Enter your password">
                        </div>
                        <button name="btn_submit" class="btn btn-primary" type="submit">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>