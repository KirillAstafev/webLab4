<div class="sign-up__wrppr mdl__wrppr">
    <div class="sign-up mdl">
        <span class="sign-up__close mdl__close">&times;</span>
        <div class="sign-up__content">
            <div class="ttl">Регистрация</div>
            <form class="sign-up__form" action="#" method="POST">
                <input class="sign-up__login" type="text" placeholder="Логин" name="login"
                       minlength="5" maxlength="15" pattern="[a-zA-Z]{5,15}" required>
                <input class="sign-up__password" type="password" placeholder="Пароль" name="password"
                       minlength="5" maxlength="15" pattern="[a-zA-Z0-9_]{5,15}" required>
                <input class="sign-up__repeat-password" type="password" placeholder="Повторите пароль"
                       name="repeatPassword"
                       minlength="5" maxlength="15" pattern="[a-zA-Z]{5,15}" required>
                <input class="sign-up__email" type="email" placeholder="Email" name="email"
                       minlength="4" maxlength="15" pattern="[a-zA-Z_.]{2,10}@[a-zA-Z_.]{2,10}.[a-zA-Z]{2,5}" required>
                <input class="sign-up__phone" type="tel" placeholder="Телефон" name="phone"
                       minlength="11" maxlength="11" pattern="[0-9]{11}">
                <div class="checkbox__wrapper">
                    <input class="sign-up-agree" type="checkbox" name="isAgreeWithPrivatePolicy" required>
                    <span>Согласие на обработку</span>
                </div>
                <button class="sign-up-btn btn" type="submit">Зарегистрироваться</button>
            </form>

        </div>
    </div>
</div>