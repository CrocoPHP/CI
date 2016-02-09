<?php
/**
 *
 */

namespace CrocoPhpCI\Application\Manager;
use CrocoPhpCI\Application\CrocoPhpAbstract;
use CrocoPhpCI\Base\CommandInterface;
use CrocoPhpCI\Base\Config\StatementConfig;
use CrocoPhpCI\Base\Manager\ManagerInterface;
use CrocoPhpCI\Base\Statement\StatementInterface;

/**
 * Class GlobalAppManager
 * @package CrocoPhpCI\Application\Manager
 */
abstract class AbstractManager extends CrocoPhpAbstract
    implements ManagerInterface
{
    /**
     * @var array
     */
    protected $statementList = array();

    /**
     * @var CommandInterface;
     */
    protected $command;

    /**
     * set up statement className list for this manager
     * each class MUST be a StatementInterface
     *
     * @throws \InvalidArgumentException
     * @param array $statementList
     * @return mixed
     */
    public function setStatementList(array $statementList)
    {
        $this->statementList = $statementList;
        return $this;
    }

    /**
     *
     *
     * @param $className
     * @return StatementInterface
     */
    protected function createStatement($className)
    {
        $factory = $this->factory;
        /**
         * @var StatementInterface $statement
         */
        $statement = $factory($className);

        $statement->setCommit($this->commit)
            ->setCommandLine($this->command)
            ->setProject($this->project)
            ->setFactory($this->factory);

        return $statement;
    }

    /**
     * sort statements by priority
     * @return array
     */
    protected function sortStatements() {
        usort($this->statementList, function(StatementConfig $a, StatementConfig $b)
        {
            if ($a->getPriority() == $b->getPriority()) {
                return 0;
            }
            return ($a->getPriority() < $b->getPriority()) ? -1 : 1;
        });

        return $this->statementList;
    }


}