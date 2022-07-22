<?php

require_once "actions/db_connect.php";

// list all animals older then 8
$sql = "SELECT * from animals WHERE age > 8";
$result = mysqli_query($connect, $sql);
$body = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $body .= "<tr>
        <td><img class='img-thumbnail' src='pictures/" . $row['picture'] . "'</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['gender'] . "</td>
        <td>" . $row['breed'] . "</td>
        <td>" . $row['size'] . "</td>
        <td>" . $row['age'] . "</td>
        <td>" . $row['vaccine'] . "</td>
        <td>" . $row['description'] . "</td>
        <td>" . $row['location'] . "</td>
        <td>" . $row['status'] . "</td>
        <td><a href='details.php?id=" . $row['id'] . "'>
        <button class='btn btn-info btn-sm' type='button'>Details</button></a></td>
        </tr>

        <div class='col rounded'>
        <div class='card shadow-lg '>
            <img src='pictures/" . $row['picture'] . "' class='card-img-top d-none d-md-block' alt='...'>
            <div class='bg-dark'>
                <h3 class='card-title text-light text-center cardtitle'>" . $row['name'] . "</h3>
            </div>
            <div class='card-body'>
                <p class='card-text cardtitle'>Gender: " . $row['gender'] . "</p>
                <p class='card-text cardtitle'>Age: " . $row['age'] . "</p>
                <p class='card-text cardtitle'>Size:" . $row['size'] . "</p>
                <p class='card-text cardtitle'>Vaccine:" . $row['vaccine'] . "</p>
                <p class='card-text cardtitle'>Breed:" . $row['breed'] . "</p>
                <p><a href='details.php?id=" . $row['id'] . "'>
        <button class='btn btn-info btn-sm' type='button'>Details</button></a></p>
            </div>
        </div>
    </div>";
    }
} else {
    $body = "<tr><td colspan='11'><center>No Data Available </center></td></tr>";
}

mysqli_close(($connect));
?>


<!DOCTYPE html>
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

    <title>Adopt a Pet</title>
</head>

<body>

    <!-- navbar -->
    <?php require_once "components/navbar_u.php" ?>




    <!-- Animals from php -->
    <div class="container manageCard w-100 mt-3">
        <div class='mb-3 d-flex p-2 justify-content-between'>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter STATUS
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="filter.php">All</a></li>
                    <li><a class="dropdown-item" href="filter.php?status=available">Available</a></li>
                    <li><a class="dropdown-item" href="filter.php?status=adopted">Adopted</a></li>
                </ul>
            </div>
        </div>
        <p class='h2 text-center bg-secondary bg-gradient text-white p-4'> Pet Adoption</p>
        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Breed</th>
                    <th>Size</th>
                    <th>Age</th>
                    <th>Vaccine</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <section class="container">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5 justify-content-around" id="cards-content">
                        <?php echo $body ?>
                    </div>
                </section>
            </tbody>
        </table>
    </div>





    <!-- footer -->
    <?php require_once "components/footer.php" ?>
    <!-- bootstrap script -->
    <?php require_once "components/bootstrap_js.php" ?>
    <!-- my script js -->
    <script src="js/script.js"></script>

</body>

</html>