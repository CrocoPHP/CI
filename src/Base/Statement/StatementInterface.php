<?php
/**
 * statement base interface
 */
namespace CrocoPhpCI\Base\Statement;

use CrocoPhpCI\Base\CommandInterface;
use CrocoPhpCI\Base\CrocoPhpInterface;
use CrocoPhpCI\Base\Report\ReporterInterface;

/**
 * Interface StatementInterface
 * @package CrocoPhpCI\Base\Statement
 */
interface StatementInterface extends CrocoPhpInterface {

    /**
     * get a statement output errors to each reporters pools
     *
     * @param array $elements
     * @return $this
     */
    public function addToReports(array $elements);

    /**
     * return true if command valid is well executed
     *
     * return false if the package can't be validate
     *
     * @return bool
     */
    public function run();

}