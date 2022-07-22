<?php
session_start();
require_once '../../actions/db_connect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: ../../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../../login.php");
    exit;
}



if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture == "product.png") ?: unlink("../../pictures/$picture");

    $sql = "DELETE FROM animals WHERE id = {$id}";
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
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

    <title>Delete</title>
</head>

<body>

    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Delete request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
            <a href='../../home.php'><button class="btn btn-success" type='button'>Home</button></a>
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