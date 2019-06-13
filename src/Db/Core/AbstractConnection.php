<?php

namespace Rest\Db\Core;

abstract class AbstractConnection
{
    /**
     * @var string
     */
    private $dns = null;

    /**
     * @var string
     */
    private $hostName = null;

    /**
     * @var int
     */
    private $port = null;

    /**
     * @var string
     */
    private $dbName = null;

    /**
     * @var string
     */
    private $userName = null;

    /**
     * @var string
     */
    private $password = null;

    protected $connection;

    /**
     * AbstractConnection constructor.
     * @param string $hostName
     * @param string $port
     * @param string $dbName
     * @param string $userName
     * @param string $password
     */
    public function __construct(string $hostName, string $port, string $dbName, string $userName, string $password)
    {
        $this->hostName = $hostName;
        $this->port = $port;
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->password = $password;
        self::connect();
    }

    protected abstract function connect();

    public abstract function getEnvHostName();

    public abstract function getEnvPort();

    public abstract function getEnvDbName();

    public abstract function getEnvUserName();

    public abstract function getEnvPassword();

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param mixed $connection
     */
    public function setConnection($connection): void
    {
        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getDns(): string
    {
        return $this->dns;
    }

    /**
     * @param string $dns
     */
    public function setDns(string $dns): void
    {
        $this->dns = $dns;
    }

    /**
     * @return string
     */
    public function getHostName(): string
    {
        if (!$this->hostName) {
            $this->hostName = $this->getEnvHostName();
        }
        return $this->hostName;
    }

    /**
     * @param string $hostName
     */
    public function setHostName(string $hostName): void
    {
        $this->hostName = $hostName;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        if (!$this->port) {
            $this->port = $this->getEnvPort();
        }
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getDbName(): string
    {
        if (!$this->dbName) {
            $this->dbName = $this->getEnvDbName();
        }
        return $this->dbName;
    }

    /**
     * @param string $dbName
     */
    public function setDbName(string $dbName): void
    {
        $this->dbName = $dbName;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        if (!$this->userName) {
            $this->userName = $this->getEnvUserName();
        }
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        if (!$this->password) {
            $this->password = $this->getEnvPassword();
        }
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function __sleep()
    {
        return array('dsn', 'userName', 'password');
    }

    public function __wakeup()
    {
        self::connect();
    }

}