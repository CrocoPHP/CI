<?php
/**
 *
 */

namespace CrocoPhpCI\Base\Config;

/**
 * Interface StatementConfig
 * @package CrocoPhpCI\Base\Config
 */
interface StatementConfig {

    /**
     * StatementConfig constructor.
     * @param string $className
     * @param float $priority
     */
    public function __construct($className , $priority);

    /**
     *
     * full statement className
     *
     * @return string
     */
    public function getClassName();

    /**
     * return statement priority
     *
     * manager's statement are executed in order of priority
     *
     * @return float
     */
    public function getPriority();

}