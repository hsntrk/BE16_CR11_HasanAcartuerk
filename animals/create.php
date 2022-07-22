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

    <title>Add Animal</title>

</head>

<body>

    <!-- navbar -->
    <?php require_once "../components/navbar.php" ?>

    <fieldset>
        <legend class='h2'>Add Animal</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" placeholder="Name of Animal" /></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input class='form-control' type="text" name="age" placeholder="Gender" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" placeholder="Breed" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td> <select name="size" class="form-control" type="text">
                            <option value="small">small</option>
                            <option value="medium">medium</option>
                            <option value="big">big</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" /></td>
                </tr>
                <tr>
                    <th>Vaccine</th>
                    <td> <select name="vaccine" class="form-control" type="text">
                            <option value="vaccinated">vaccinated</option>
                            <option value="not vaccinated">not vaccinated</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" placeholder="Description" /></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Location" /></td>
                </tr>
                <th>Status</th>
                <td> <select name="status">
                        <option value="available">Available</option>
                        <option value="adopted">Adopted</option>
                    </select>
                </td>
                <tr>
                    <td><button class='btn btn-success' type="submit">Add Animal</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Go Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>

    <!-- footer -->
    <?php require_once "../components/footer.php" ?>
    <!-- bootstrap script -->
    <?php require_once "../components/bootstrap_js.php" ?>
    <!-- my script js -->
    <script src="../js/script.js"></script>

</body>

</html>