<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Films</title>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/index/sign-in-modal.php" ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/index/sign-up-modal.php" ?>

<div class="wrppr">
    <div class="container">
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/general/header.php" ?>
        <?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/index/main-content.php" ?>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/general/footer.php" ?>
</div>

<script src="js/main.js"></script>
</body>
</html>