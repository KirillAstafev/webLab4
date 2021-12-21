<?php
require $_SERVER['DOCUMENT_ROOT'] . '/components/DB.php';
$offset = $_GET['offset'];

$bd = new DBConnection();
$sql = <<< END
            SELECT review.id       AS review_id,
            review.create_datetime AS review_create_datetime,
            review.trailer_link    AS review_trailer_link,
            review.poster_blob     AS review_poster_blob,
            review.header          AS review_header,
            review.content         AS review_content,
            user.login             AS user_login
            FROM review
                LEFT JOIN user ON review.user_id = user.id
            WHERE review.id < $offset
            ORDER BY review.id DESC
            limit 10
        END;
$reviews = $bd->fetchAll($sql);
?>


<?php foreach ($reviews as $review): ?>
    <div class="card">
        <a class="card__link" href="/layouts/detail_review.php?id=<?= $review['review_id'] ?>">
            <img src="data:image/jpeg;base64, <?= base64_encode($review['review_poster_blob']) ?>"
                 class="img-<?= $review['review_id'] ?>"
                 alt="Нет фото"/>
            <div class="card__info">
                <span class="card__name"><?= $review['review_header'] ?></span>
                <div class="card__second-row">
                            <span class="card__upload-date">
                                <?= date('d M Y', strtotime($review['review_create_datetime'])) ?>
                            </span>
                    <span class="card__author"><?= $review['user_login'] ?></span>
                </div>
            </div>
        </a>
    </div>
<?php endforeach; ?>


