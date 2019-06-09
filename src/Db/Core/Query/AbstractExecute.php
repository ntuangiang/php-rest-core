<?php

namespace Php\Framework\Db\Core\Query;

include_once "../AbstractConnection.php";

use Php\Framework\Db\Core\AbstractConnection;
use \PDOStatement;
use \PDO;

abstract class AbstractExecute
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
     * @return PDOStatement
     */
    public abstract function execute($query, $data): PDOStatement;

}