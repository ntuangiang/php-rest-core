<?php

namespace Rest\Db\Mysql;

use \Rest\Db\Core\AbstractSchema;
use \Rest\Db\Mysql\Query\MysqlExecute;
use \Rest\Db\Mysql\Query\MySqlQuery;

class MysqlSchema extends AbstractSchema
{
    public const SCHEMA_NAME = "schemaName";

    public const FOREIGN_KEY = "foreignKey";

    public const JOIN_METHOD = "joinMethod";

    public const JOIN_NAME = "joinName";

    public const LEFT_JOIN = "leftJoin";

    public const RIGHT_JOIN = "rightJoin";

    public const INNER_JOIN = "innerJoin";

    /**
     * @var string
     */
    private $primaryKey;

    public function __construct(string $tableName, string $primaryKey, string $mappingModel = null)
    {
        parent::__construct(self::getMysqlQuery(), self::getMysqlExecute(), $tableName);

        $this->primaryKey = $primaryKey;
    }

    public function getMysqlQuery() {
        return null;
    }

    private function getMysqlExecute() {
        return null;
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }

    /**
     * @param string $primaryKey
     */
    public function setPrimaryKey(string $primaryKey): void
    {
        $this->primaryKey = $primaryKey;
    }

}