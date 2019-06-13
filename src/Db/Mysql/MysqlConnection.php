<?php

namespace Rest\Db\Mysql;

use \Rest\Db\Core\AbstractConnection;
use \PDOException;
use \PDO;

class MysqlConnection extends AbstractConnection
{
    public function __construct(string $hostName, string $port, string $dbName, string $userName, string $password)
    {
        parent::__construct($hostName, $port, $dbName, $userName, $password);
    }

    protected function connect()
    {
        try {
            $options = array(
                PDO::ATTR_PERSISTENT => TRUE,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );

            $this->connection = new PDO(self::getDns(), self::getUserName(), self::getPassword(), $options);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getDns(): string
    {
        return "mysql:host={$this->getHostName()};port={$this->getPort()};dbname={$this->getDbName()}";
    }

    public function getEnvHostName()
    {
        return getenv("MYSQL_HOST_NAME");
    }

    public function getEnvPort() {
        return getenv("MYSQL_PORT");
    }

    public function getEnvDbName()
    {
        return getenv("MYSQL_DATABASE");
    }

    public function getEnvUserName()
    {
        return getenv("MYSQL_USERNAME");
    }

    public function getEnvPassword()
    {
        return getenv("MYSQL_PASSWORD");
    }

}