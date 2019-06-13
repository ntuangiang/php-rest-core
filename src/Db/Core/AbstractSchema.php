<?php

namespace Rest\Db\Core;

use \Rest\Db\Core\Query\AbstractExecute;
use \Rest\Db\Core\Query\AbstractQuery;

abstract class AbstractSchema
{
    /**
     * @var AbstractQuery
     */
    private $query;

    /**
     * @var AbstractExecute
     */
    private $execute;

    /**
     * @var string
     */
    private $tableName;

    /**
     * AbstractSchema constructor.
     * @param AbstractQuery $query
     * @param AbstractExecute $execute
     * @param string $tableName
     */

    public function __construct(AbstractQuery $query, AbstractExecute $execute, string $tableName)
    {
        $this->query = $query;

        $this->execute = $execute;

        $this->tableName = $tableName;
    }

}