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

    <title>Error</title>
</head>

<body>

    <!-- navbar -->
    <?php require_once "components/navbar.php" ?>

    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Invalid Request</h1>
        </div>
        <div class="alert alert-warning" role="alert">
            <p>You've made an invalid request. Please <a href="login.php" class="alert-link">go back</a> to index and try again.</p>
        </div>
    </div>

    <!-- footer -->
    <?php require_once "components/footer.php" ?>
    <!-- bootstrap script -->
    <?php require_once "components/bootstrap_js.php" ?>
    <!-- my script js -->
    <script src="js/script.js"></script>

</body>

</html>