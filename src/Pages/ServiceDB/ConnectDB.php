<?php

namespace src\ServiceDB;

class ConnectDB
{
    private $conn;

    public function __construct()
    {
        $config = parse_ini_file('config.ini');
        $driver = $config['driver'];
        $host = $config['host'];
        $port = $config['port'];
        $dbname = $config['dbname'];
        $user = $config['user'];
        $pass = $config['pass'];

        $conn = new \PDO($driver.':host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);
        $this->conn = $conn;
    }

    public function getConn()
    {
        return $this->conn;
    }

}
