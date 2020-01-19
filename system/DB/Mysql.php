<?php


namespace System\DB;


class Mysql
{
    private $conn;
    private $result;


    public function __construct()
    {
       $this->conn = new \PDO("mysql:host:localhost;dbname=demo", "root", "");
    }
    public function run($sql)
    {

    }
}