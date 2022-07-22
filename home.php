<?php
session_start();
require_once "actions/db_connect.php";

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row_u = mysqli_fetch_array($res, MYSQLI_ASSOC);



$sql = "SELECT * from animals";
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
        </tr>";
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
    <?php require_once "components/navbar.php" ?>


    <div class="container manageCard w-50 mt-3 d-flex justify-content-center flex-column text-center">
        <div class="">
            <img class="userImage rounded-circle" src="pictures/<?php echo $row_u['picture']; ?>" alt="<?php echo $row_u['first_name']; ?>">
            <h2 class="text-dark mt-5 mb-3">
                <strong>&nbsp; Hi <?php echo $row_u['first_name'] . " " . $row_u['last_name']; ?>
                </strong>
            </h2>
            <h4 class="text-dark mb-3">
                <strong>&nbsp; you are logged in with <?php echo $row_u['email']; ?>
                </strong>
            </h4>
        </div>
        <a href="logout.php?logout" class="btn btn-danger mb-3">Sign Out</a>
        <a href="update.php?id=<?php echo $_SESSION['user'] ?>" class="btn btn-outline-info mb-3">Update your Profile</a>

    </div>



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
                <?php echo $body ?>
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