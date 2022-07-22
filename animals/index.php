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

// select logged-in admin details
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['adm']);
$row_a = mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql = "SELECT * from animals";
$result = mysqli_query($connect, $sql);
$body = "";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $body .= "<tr>
        <td><img class='img-thumbnail' src='../pictures/" . $row['picture'] . "'</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['gender'] . "</td>
        <td>" . $row['breed'] . "</td>
        <td>" . $row['size'] . "</td>
        <td>" . $row['age'] . "</td>
        <td>" . $row['vaccine'] . "</td>
        <td>" . $row['description'] . "</td>
        <td>" . $row['location'] . "</td>
        <td>" . $row['status'] . "</td>
            <td><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Update</button></a>
            <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-outline-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>";
    }
} else {
    $body = "<tr><td colspan='11'><center>No Data Available </center></td></tr>";
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

    <title>Adopt a Pet</title>
</head>

<body>

    <!-- navbar -->
    <?php require_once "../components/navbar.php" ?>


    <div class="container manageCard w-50 mt-3 d-flex justify-content-center flex-column text-center">
        <div class="">
            <img class="userImage rounded-circle" src="../pictures/<?php echo $row_a['picture']; ?>" alt="<?php echo $row_a['first_name']; ?>">
            <h2 class="text-dark mt-5 mb-5">
                <strong>&nbsp; Hi <?php echo $row_a['first_name'] . " " . $row_a['last_name']; ?>
                </strong>
            </h2>
        </div>
        <a href="../dashboard.php" class="btn btn-secondary mb-3"><i class="fa-solid fa-backward"></i> &nbsp; Go Back to Dashboard</a>
        <a href="../update.php?id=<?php echo $_SESSION['adm'] ?>" class="btn btn-outline-info mb-3">Update your Profile &nbsp; <i class="fa-solid fa-wrench"></i></a>
        <a href="../logout.php?logout" class="btn btn-danger mb-3">Sign Out &nbsp; <i class="fa-solid fa-right-from-bracket"></i></a>
    </div>


    <!-- Animals from php -->
    <div class="container manageCard w-100 mt-3">
        <a href="create.php" class="btn btn-info mb-3">ADD a new PET to the database</a>

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
    <?php require_once "../components/footer.php" ?>
    <!-- bootstrap script -->
    <?php require_once "../components/bootstrap_js.php" ?>
    <!-- my script js -->
    <script src="../js/script.js"></script>

</body>

</html>