<?php
/**
 * use this management for all statement concerning
 * all the application like unit testing, functional testing,
 * build process, composer etc .......
 */

namespace CrocoPhpCI\Application\Manager;

use CrocoPhpCI\Base\Config\StatementConfig;
use CrocoPhpCI\Base\Manager\ManagerInterface;

/**
 * Class GlobalAppManager
 * @package CrocoPhpCI\Application\Manager
 */
class GlobalAppManager extends AbstractManager
    implements ManagerInterface
{
    /**
     * initialisation process make it your
     *
     * @return $this
     */
    public function init()
    {
       $factory = $this->getFactory();

       $this->sortStatements();
       $this->setCommandLine($factory('\CrocoPhpCI\Application\Command\BasicCommand'));

        return $this;
    }

    /**
     * return the result of all statement
     *
     * @return bool
     */
    public function execute()
    {
        $outPut = true;

        /**
         * @var StatementConfig $statementConfig
         */
        foreach($this->statementList as $statementConfig) {

            $statement = $this->createStatement($statementConfig->getClassName());

            $result = $statement->run();

            if($result === false) {
                $outPut = false;
            }


        }
        return $outPut;
    }


}