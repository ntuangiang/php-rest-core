<?php

namespace Rest\Db\Mysql\Query;

use \Rest\Db\Core\Query\AbstractQuery;
use \Rest\Db\Mysql\MysqlConnection;
use \PDOException;
use \PDO;

class MySqlQuery extends AbstractQuery
{
    /**
     * @var MySqlQuery
     */
    private static $instance = null;

    /**
     * @return MySqlQuery
     */
    public static function getInstance() {
        if (MySqlQuery::$instance === null) {
            MySqlQuery::$instance = new MySqlQuery();
        }

        return MySqlQuery::$instance;
    }

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
     * @return array
     */
    public function query($query, $data): array
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

            return $statement->fetchAll();

        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * @param string $query
     * @param array $data
     * @return mixed
     */
    public function scalar($query, $data)
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

            return $statement->fetch();

        } catch (PDOException $e) {
            throw $e;
        }
    }
}