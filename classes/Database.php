<?php

namespace app;

class Database
{
    public function connect()
    {
        $pdo = new \PDO('mysql:host=localhost;port=3306;dbname=products', 'root', '');
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        if($pdo)
        {
            return $pdo;
        }else
        {
            echo 'Provjerite vašu konekciju';
        }
    }
}