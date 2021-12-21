<header class="hdr">
    <div class="hdr__logo">
        <a href="/">Films</a>
    </div>
    <div class="hdr__btns">
        <?php if (!isset($_SESSION['userLogin'])): ?>
            <button class="hdr__sign-in-btn btn">Войти</button>
            <button class="hdr__sign-up-btn btn">Зарегистрироваться</button>
        <?php else: ?>
            <p>Привет <?= $_SESSION['userLogin'] ?></p>
            <a class="btn exit-btn"
               href="/logout.php">Выход</a>
        <?php endif; ?>
    </div>
</header>