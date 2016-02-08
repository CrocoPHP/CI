<?php
/**
 * managers are called by bootstrap
 * they MUST execute each statement treatments
 */

namespace CrocoPhpCI\Base\Manager;

use CrocoPhpCI\Base\CrocoPhpInterface;

/**
 * Interface ManagerInterface
 * @package CrocoPhpCI\Base\Manager
 */
interface ManagerInterface extends CrocoPhpInterface
{


    /**
     * set up statement className list for this manager
     * each class MUST be a StatementInterface
     *
     * @throws \InvalidArgumentException
     * @param array $statementList
     * @return mixed
     */
    public function setStatementList(array $statementList);

    /**
     * initialisation process make it your
     *
     * @return $this
     */
    public function init();

    /**
     * return the result of all statement
     *
     * @return bool
     */
    public function execute();


}