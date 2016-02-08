<?php
/**
 * interface of Manager config
 */

namespace CrocoPhpCI\Base\Config;
/**
 * Interface ManagerConfig
 * @package CrocoPhpCI\Base\Config
 */
interface ManagerConfig {

    /**
     * ManagerConfig constructor.
     * @param string $className
     * @param array $statementList
     * @param float $priority
     */
    public function __construct($className , array $statementList , $priority);

    /**
     * return full manager className
     *
     * @return string
     */
    public function getClassName();

    /**
     * return list of statements config
     *
     * like :
     *
     * array(
     *      new \Statement\StatementConfig(....),
     *      new \Statement\StatementConfig(....),
     *      new \Statement\StatementConfig(....),
     * );
     *
     * @return array
     */
    public function getStatementList();

    /**
     *
     *
     * @return float
     */
    public function getPriority();

}