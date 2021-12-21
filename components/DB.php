<?php

class DBConnection
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): DBConnection
    {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config/config.ini");
        $this->link = new PDO('mysql:host=' . $config['host'] . ';dbname='
            . $config['dbname'],
            $config['login'],
            $config['password']);

        return $this;
    }


    public function execute(string $sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function fetchAll(string $sql): array
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if ($result === false) {
            return [];
        }
        return $result;
    }

    public function fetch(string $sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    public function getConnection(): PDO
    {
        return $this->link;
    }


}
