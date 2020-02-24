<?php


namespace System\DB;


class Mysql
{
    private $conn;
    private $result;


    public function __construct()
    {
       $this->conn = new \PDO("mysql:host=".config('db_host').";dbname=".config('db_name'), config('db_user'), config('db_pass'));

        $this->conn->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    public function run($sql)
    {

    $this->result = $this->conn->prepare($sql);
    return $this->result->execute();
    }

    public function fetch()
    {
        return $this->result->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function num_rows()
    {
        return $this->result->rowCount();
    }
    public function insert_id()
    {
        return $this->conn->lastInsertId();
    }
}