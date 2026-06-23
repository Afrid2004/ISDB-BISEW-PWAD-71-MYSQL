<?php
$err = "";
$src = "";
if (isset($_POST['btn_submit'])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $tmp_name = $file['tmp_name'];
    $fileType = $file['type'];
    $fileSize = $file['size'];
    $error = $file['error'];

    $allowedType = ["image/jpeg", "image/jpg", "image/png", "image/webp"];
    $isOkType = in_array($fileType, $allowedType);
    $size = 1024 * 1024 * 2; // max file size is 2 mb

    // if the type of image matches with allowed type
    if ($isOkType) {
        // check image size
        if ($fileSize <= $size) {
            // if ther no error then upload the file
            if (!$error) {
                $src = 'uploads/' . $fileName;
                move_uploaded_file($tmp_name, $src);
            } else {
                $err = "Some thing went wrong! Please try agani later.";
            }
        } else {
            $err = "Image file size cannot exceed 2MB";
        }
    } else {
        $err = "Inavalid Type! Image allowed type jpeg, jpg, png and webp.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <title>Photo Upload</title>
</head>

<body>
    <div class="bg-light">
        <div>
            <div class="container">
                <div class="min-vh-100 d-flex align-items-center justify-content-center">
                    <div class="w-50 bg-white rounded-4 shadow-sm p-4 h-100">
                        <h3 class="mb-3">Upload Photo</h3>
                        <div>
                            <div class="image_div mx-auto mb-3">
                                <img src="<?php echo $src ? $src : './images/profile.jpg' ?>" alt="profile">
                            </div>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="file" class="form-control mb-3" required>
                            <button type="submit" name="btn_submit" class="btn btn-success w-100">Upload Photo</button>
                        </form>
                        <?php if($err) {?>
                            <div class="alert alert-danger py-2 mt-2 mb-0"><?php echo $err ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>