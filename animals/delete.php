<?php
session_start();

require_once '../actions/db_connect.php';

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}


if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $name = $data['name'];
        $breed = $data['breed'];
        $age = $data['age'];
        $location = $data['location'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <?php require_once "../components/bootstrap.php" ?>
    <!-- fontawesome kit icons -->
    <?php require_once "../components/fontawesome.php" ?>
    <!-- bootstrap icons -->
    <?php require_once "../components/bootstrap_icons.php" ?>
    <!-- Font Family -->
    <?php require_once "../components/font_family.php" ?>
    <!-- Animate style -->
    <?php require_once "../components/animate.php" ?>
    <!-- my style css -->
    <link rel="stylesheet" href="../css/style.css">

    <title>Delete Animal</title>
</head>

<body>

    <!-- navbar -->
    <?php require_once "../components/navbar.php" ?>


    <div class="container m-5">
        <fieldset>
            <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <h5>You have selected the data below:</h5>
            <table class="table w-75 mt-3">
                <tr>
                    <td>
                        <h3 class="text-dark p-2 rounded"><?php echo $name ?></h3>
                    </td>
                </tr>
            </table>

            <h3 class="mb-4">Do you really want to delete this product?</h3>
            <form action="actions/a_delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
            </form>
        </fieldset>
    </div>


    <!-- footer -->
    <?php require_once "../components/footer.php" ?>
    <!-- bootstrap script -->
    <?php require_once "../components/bootstrap_js.php" ?>
    <!-- my script js -->
    <script src="../js/script.js"></script>

</body>

</html>