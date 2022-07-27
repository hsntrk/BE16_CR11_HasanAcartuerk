<?php
session_start();

require_once '../actions/db_connect.php';
require_once '../actions/file_upload.php';

if (isset($_SESSION['user']) != "") {
    header("Location: ../home.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data["name"];
        $gender = $data["gender"];
        $breed = $data["breed"];
        $size = $data["size"];
        $age = $data["age"];
        $vaccine = $data["vaccine"];
        $description = $data["description"];
        $location = $data["location"];
        $status = $data["status"];
        $picture = $data["picture"];
    } else {
        header("location: error.php");
    }
} else {
    header("location: error.php");
}


mysqli_close($connect);

?>

<!DOCTYPE html>
<html>

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

    <title>Edit Animals</title>
</head>

<body>

    <!-- navbar -->
    <?php require_once "../components/navbar.php" ?>

    <fieldset>
        <legend class='h2'>Update Animal<img class='img-thumbnail rounded-circle' src='../pictures/<?php echo $picture ?>' alt=""></legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <td><input class='form-control' type="text" name="name" value="<?= $name ?>" placeholder="Name of Animal" /></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><input class='form-control' type="text" name="gender" value="<?= $gender ?>" placeholder="Gender" /></td>
                </tr>
                <tr>
                    <th>Breed</th>
                    <td><input class='form-control' type="text" name="breed" value="<?= $breed ?>" placeholder="Breed" /></td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td> <select name="size">
                            <option <?php if ($size == "small") {
                                        echo "selected";
                                    }  ?> value="small">small</option>
                            <option <?php if ($size == "medium") {
                                        echo "selected";
                                    }  ?> value="medium">medium</option>
                            <option <?php if ($size == "big") {
                                        echo "selected";
                                    }  ?> value="big">big</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><input class='form-control' type="number" name="age" value="<?= $age ?>" /></td>
                </tr>
                <tr>
                    <th>Vaccine</th>
                    <td> <select name="vaccine">
                            <option <?php if ($vaccine == "vaccinated") {
                                        echo "selected";
                                    }  ?> value="vaccinated">vaccinated</option>
                            <option <?php if ($vaccine == "not vaccinated") {
                                        echo "selected";
                                    }  ?> value="not vaccinated">not vaccinated</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class='form-control' type="text" name="description" value="<?= $description ?>" placeholder="Description" /></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input class='form-control' type="text" name="location" placeholder="Location" value="<?= $location ?>" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <th>Status</th>
                <td> <select name="status">
                        <option <?php if ($status == "available") {
                                    echo "selected";
                                }  ?> value="available">Available</option>
                        <option <?php if ($status == "adopted") {
                                    echo "selected";
                                }  ?> value="adopted">Adopted</option>
                    </select>
                </td>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    <input type="hidden" name="picture" value="<?php echo $data['picture'] ?>" />
                    <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                    <td><a href="index.php"><button class="btn btn-warning" type="button">Go Back</button></a></td>
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