<?php
require_once "actions/db_connect.php";

$id = $_GET["id"];
$sql = "select * from animals where id = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap cdn -->
    <?php require_once "components/bootstrap.php" ?>
    <!-- fontawesome kit icons -->
    <?php require_once "components/fontawesome.php" ?>
    <!-- bootstrap icons -->
    <?php require_once "components/bootstrap_icons.php" ?>
    <!-- Font Family -->
    <?php require_once "components/font_family.php" ?>
    <!-- Animate style -->
    <?php require_once "components/animate.php" ?>
    <!-- my style css -->
    <link rel="stylesheet" href="css/style.css">

    <title>Details</title>
</head>

<body class=" bg-light">

    <!-- navbar -->
    <?php require_once "components/navbar.php" ?>

    <!-- media library from php -->
    <div class="manageCard w-75 mt-3">


        <p class='h2 text-center bg-secondary bg-gradient text-white p-4'>Details of " <?= $row["name"] ?> "</p>

        <div class="card mb-3" style="max-width: 80vw">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src='pictures/<?= $row["picture"] ?>' class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?= $row["name"] ?></h2>
                        <hr>
                        <p class="card-text">
                            <strong>Breed:</strong> <?= $row["breed"] ?>
                        </p>
                        <p class="card-text">
                            <strong>Size:</strong> <?= $row["size"] ?>
                        </p>
                        <p class="card-text">
                            <strong>Age:</strong> <?= $row["age"] ?>
                        </p>
                        <p class="card-text">
                            <strong>Vaccine:</strong> <?= $row["vaccine"] ?>
                        </p>
                        <p class="card-text">
                            <strong>Description:</strong> <?= $row["description"] ?>
                        </p>
                        <p class="card-text">
                            <strong>Location:</strong> <?= $row["location"] ?>
                        </p>
                        <p class="card-text">
                            <strong>Status Availability: </strong> <?= $row["status"] ?>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <a href="home.php" class="btn btn-outline-info btn-lg ps-4 pe-4 mb-5 mt-3"><i class="fa-solid fa-backward"></i>&ensp; Back to Overview &ensp;
        </a>
    </div>



    <!-- footer -->
    <?php require_once "components/footer.php" ?>
    <!-- bootstrap script -->
    <?php require_once "components/bootstrap_js.php" ?>
    <!-- my script js -->
    <script src="js/script.js"></script>


</body>

</html>