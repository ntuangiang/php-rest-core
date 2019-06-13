<?php

namespace Rest\Db\Mysql\Query;

use Rest\Db\Core\Query\AbstractExecute;
use Rest\Db\Mysql\MysqlConnection;
use \PDOStatement;
use \PDOException;
use \PDO;

class MysqlExecute extends AbstractExecute
{
    /**
     * @var array
     */
    private $cursor = null;

    /**
     * MySqlQuery constructor.
     * @param MysqlConnection $connection
     */
    public function __construct(MysqlConnection $connection)
    {
        parent::__construct($connection);
        $this->cursor = array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY);
    }

    /**
     * @param string $query
     * @param array $data
     * @return array|bool|PDOStatement|null
     */
    public function execute($query, $data): PDOStatement
    {
        $statement = NULL;

        try {
            if ($data === NULL) {
                $statement = $this->connection->prepare($query);
                $statement->execute();
            } else {
                $statement = $this->connection->prepare($query, $this->cursor);

                $statement->execute($data);
            }

            return $statement;

        } catch (PDOException $e) {
            throw $e;
        }
    }
}