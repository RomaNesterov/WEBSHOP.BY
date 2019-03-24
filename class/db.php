<?php


class db
{
    public $connect;

    public function connectionDb()
    {
        $this->connect = new mysqli("localhost", "Roma", "1989", "WEBSHOP.BY");
    }
}

$connection = new db();
$myrow = $connection->connectionDb();