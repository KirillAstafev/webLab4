<?php
require $_SERVER['DOCUMENT_ROOT'] . '/components/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/util.php';
$id = intval($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>Films</title>
</head>
<body>
<?php
$db = new DBConnection();
$sql = <<< END
            select review.id           as review_id,
                review.create_datetime as review_create_datetime,
                review.trailer_link    as review_trailer_link,
                review.poster_blob     as review_poster_blob,
                review.header          as review_header,
                review.content         as review_content,
                user.login             as user_login
            from review
                left join user on review.user_id = user.id
            where review.id = $id;
        END;
$review = $db->fetch($sql);
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/index/sign-in-modal.php" ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/index/sign-up-modal.php" ?>
<div class="container">
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/general/header.php" ?>
    <div class="detail-information">
        <h1 class="detail-information__header"><?= $review['review_header'] ?></h1>
        <img class="detail-information__poster"
             src="data:image/jpeg;base64, <?= base64_encode($review['review_poster_blob']) ?>"
             alt="Нет фото"/>
        <h2 class="detail-information__trailer-header">Трейлер:</h2>
        <iframe class="detail-information__iframe"
                width="560" height="315"
                src="<?= getEmbedLink($review['review_trailer_link']) ?>"
                title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
        </iframe>
        <span class="detail-information__content"><?= $review["review_content"] ?></span>
    </div>

</div>
<?php require $_SERVER['DOCUMENT_ROOT'] . "/parts/general/footer.php" ?>
<script src="/js/main.js"></script>
</body>
</html>