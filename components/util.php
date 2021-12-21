<?php

require_once "components/DB.php";

// input  https://www.youtube.com/watch?v=qcPfI0y7wRU
// output https://www.youtube.com/embed/qcPfI0y7wRU
function getEmbedLink(string $link): string
{
    $eqPos = strpos($link, "=");
    return "https://www.youtube.com/embed/" . substr($link, $eqPos + 1);
}

function getUserByLogin(string $login)
{
    $db = new DBConnection();

    $sql = <<< END
       select * 
       from user 
       where login = ?
    END;

    $dbh = $db->getConnection();
    $sth = $dbh->prepare($sql);
    $sth->bindValue(1, $login);

    return $sth->fetch();
}

function saveUser(string $login, string $email, string $phone, string $password)
{
    $db = new DBConnection();

    $sLogin = htmlspecialchars($login);
    $sEmail = htmlspecialchars($email);
    $sPhone = htmlspecialchars($phone);
    $sPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = <<< END
        insert into user(login, email, phone, psswrd)
        values(?, ?, ?, ?);
    END;

    $pdo = $db->getConnection();
    $sth = $pdo->prepare($sql);
    $sth->bindValue(1, $sLogin);
    $sth->bindValue(2, $sEmail);
    $sth->bindValue(3, $sPhone);
    $sth->bindValue(4, $sPassword);

    $sth->execute();

    return getUserIdByLogin($login);
}

function getUserIdByLogin(string $login)
{
    $db = new DBConnection();

    $sql = <<< END
        select id
        from user 
        where login = ?
    END;

    $pdo = $db->getConnection();
    $sth = $pdo->prepare($sql);
    $sth->bindValue(1, $login);

    $entity = $sth->fetch();

    return $entity ? $entity['id'] : false;
}

function getUserIfPasswordVerify($login, $password): mixed
{
    $user = getUserByLogin($login);
    if ($user) {
        if (password_verify($password, $user['psswrd'])) {
            return $user;
        }
    }

    return false;
}