<?php

namespace Php\Framework\Db\Core\Query;

include_once "../AbstractConnection.php";

use \Php\Framework\Db\Core\AbstractConnection;
use \PDO;

abstract class AbstractQuery
{
    /**
     * @var PDO
     */
    public $connection;

    /**
     * AbstractQuery constructor.
     * @param AbstractConnection $connection
     */
    public function __construct(AbstractConnection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    /**
     * @param string $query
     * @param array $data
     * @return array
     */
    public abstract function query($query, $data): array;

    /**
     * @param string $query
     * @param array $data
     * @return mixed
     */
    public abstract function scalar($query, $data);
}