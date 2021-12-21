<?php

require "components/DB.php";
require "components/util.php";

header('Content-Type: application/json');

$login = $_POST['login'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$isAgreeWithPrivatePolicy = $_POST['isAgreeWithPrivatePolicy'];



if (strlen($login) < 5 || strlen($login) > 15) {
    $errors[] = "Длина логина должна быть больше 4 и меньше 16 символов";
} else if (getUserByLogin($login) != false) {
    $errors[] = "Пользователь с таким логином уже существует";
} else if (strlen($password) < 5 || strlen($password) > 15) {
    $errors[] = "Длина пароля должна быть больше 4 и меньше 16 символов.";
} else if (!strcmp($password, $repeatPassword) == 0) {
    $errors[] = "Пароли не совпадают!";
} else if ($isAgreeWithPrivatePolicy != 'on') {
    $errors[] = "Соглашение обязательно к принятию";
}

if (!empty($errors)) {
    echo json_encode(['errors' => $errors]);
    die();
}

$userId = saveUser($login, $email, $phone, $password);

if ($userId == false) {
    echo "Пользователь не сохранен!";
    die();
}

Session::set("userLogin", getUserIdByLogin($login));
Session::set("userLogin", $login);

echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);


