<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("location:logout.php");
    exit();
}
$name = $_SESSION['name'];
$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="d-flex align-items-center justify-content-between py-2">
                    <div>
                        <p class="mb-0">Wellcome! <?php echo "{$name}, id: {$id}" ?></p>
                    </div>
                    <div><button class="btn btn-sm btn-dark" onclick="window.location.href='logout.php'">Logout</button></div>
                </div>
            </nav>
        </header>
    </div>
</body>

</html>