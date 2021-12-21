<?php
require "components/util.php";
header('Content-Type: application/json');

$errors = [];
$login = $_POST['login'];
$password = $_POST['password'];
if (strlen($login) < 5 || strlen($login) > 15) {
    $errors[] = "Длина логина должна быть больше 4 и меньше 16 символов";
} else if (strlen($password) < 5 || strlen($password) > 15) {
    $errors[] = "Длина пароля должна быть больше 4 и меньше 16 символов.";
}

if (!empty($errors)) {
    echo json_encode(['errors' => $errors]);
    die();
}

if (getUserByLogin($login) == false) {
    $errors[] = "Пользователь с таким логином не найден";
} else if (getUserIfPasswordVerify($login, $password) == false) {
    $errors[] = "Пароль не верный";
}

if (!empty($errors)) {
    echo json_encode(['errors' => $errors]);
    die();
}

Session::set("userLogin", getUserIdByLogin($login));
Session::set("userLogin", $login);

echo json_encode(['success' => true], JSON_UNESCAPED_UNICODE);