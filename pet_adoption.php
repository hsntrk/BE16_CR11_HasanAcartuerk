<?php
session_start();

require_once "actions/db_connect.php";

if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Adopt Animal
if (isset($_POST["submit"])) {
    $animal_id = $_GET["id"];
    $user_id = $_SESSION["user"];
    $adoption_date = $_POST["adoption_date"];

    $sql = "INSERT INTO pet_adoption (fk_user_id, fk_animal_id, adoption_date) VALUES ($user_id, $animal_id, '$adoption_date')";
    $sql_status = "UPDATE animals set status = 'adopted' WHERE id = $animal_id";
    $result = mysqli_query($connect, $sql);
    $result_status = mysqli_query($connect, $sql_status);
    if ($result && $result_status) {
        $class = "success";
        $message = "Successfully Adopted!";
        header("refresh:4; url=home.php");
    } else {
        echo "Error";
    }
}


// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row_u = mysqli_fetch_array($res, MYSQLI_ASSOC);

mysqli_close($connect);

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


    <div class="container manageCard w-100 mt-3 d-flex justify-content-around flex-row text-center align-items-center">
        <!-- <div class="">
            <img class="userImage rounded-circle" src="pictures/<?php echo $row_u['picture']; ?>" alt="<?php echo $row_u['first_name']; ?>">
        </div> -->
        <div>
            <h3 class="text-dark">
                &nbsp; Hi <?php echo $row_u['first_name'] . " " . $row_u['last_name']; ?>
            </h3>
        </div>
        <div>
            <a href="home.php" class="btn btn-secondary mb-3"><i class="fa-solid fa-backward"></i> &nbsp; Go Back Home</a>
            <a href="update.php?id=<?php echo $_SESSION['user'] ?>" class="btn btn-outline-info mb-3">Update your Profile</a>
            <a href="logout.php?logout" class="btn btn-danger mb-3">Sign Out</a>
        </div>

    </div>



    <!-- Pet Adoption User php -->
    <div class="container manageCard w-100 mt-3">
        <p class='h2 text-center bg-secondary bg-gradient text-white p-4'> Pet Adoption</p>
        <section class="d-flex flex-column">
            <div class="alert alert-<?php echo $class; ?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <form method="POST" class="justify-content-center text-center">
                    <div class="m-2 p-2">
                        <h2>Take me Home</h2>
                    </div>
                    <div class="m-2 p-2">
                        <input type="date" name="adoption_date">
                    </div>
                    <button class="btn btn-success p-3 m-2" type="submit" name="submit">Take me Home</button>
                </form>
        </section>
    </div>





    <!-- footer -->
    <?php require_once "components/footer.php" ?>
    <!-- bootstrap script -->
    <?php require_once "components/bootstrap_js.php" ?>
    <!-- my script js -->
    <script src="js/script.js"></script>

</body>

</html>