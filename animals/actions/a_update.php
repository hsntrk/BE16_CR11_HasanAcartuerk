<?php
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: ../../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../../login.php");
    exit;
}


require_once '../../actions/db_connect.php';
require_once '../../actions/file_upload.php';


if ($_POST) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $breed = $_POST['breed'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $vaccine = $_POST['vaccine'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $id = $_POST['id'];
    //variable for upload pictures errors is initialised
    $uploadError = '';

    $picture = file_upload($_FILES['picture'], 'animal'); //file_upload() called  
    if ($picture->error === 0) {
        ($_POST["picture"] == "animal.png") ?: unlink("../../pictures/$_POST[picture]");
        $sql = "UPDATE animals SET name = '$name', gender = '$gender', breed = '$breed', size = '$size', age = $age, vaccine = '$vaccine', description = '$description', location = '$location', picture = '$picture->fileName' WHERE id = {$id}";
    } else {
        $sql = "UPDATE animals SET name = '$name', gender = '$gender', breed = '$breed', size = '$size', age = '$age', vaccine = '$vaccine', description = '$description', location = '$location' WHERE id = {$id}";
    }
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
} else {
    header("location: ../error.php");
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <?php require_once "../../components/bootstrap.php" ?>
    <!-- fontawesome kit icons -->
    <?php require_once "../../components/fontawesome.php" ?>
    <!-- bootstrap icons -->
    <?php require_once "../../components/bootstrap_icons.php" ?>
    <!-- Font Family -->
    <?php require_once "../../components/font_family.php" ?>
    <!-- Animate style -->
    <?php require_once "../../components/animate.php" ?>
    <!-- my style css -->
    <link rel="stylesheet" href="../../css/style.css">

    <title>Update</title>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>



    <!-- footer -->
    <?php require_once "../../components/footer.php" ?>
    <!-- bootstrap script -->
    <?php require_once "../../components/bootstrap_js.php" ?>
    <!-- my script js -->
    <script src="../../js/script.js"></script>


</body>

</html>