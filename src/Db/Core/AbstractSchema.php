<?php

namespace Php\Framework\Db\Core;

include_once "Query/AbstractQuery.php";
include_once "Query/AbstractExecute.php";

use Php\Framework\Db\Core\Query\AbstractExecute;
use Php\Framework\Db\Core\Query\AbstractQuery;

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