<?php
/**
 * use this manager for each statement using
 * git diff
 */

namespace CrocoPhpCI\Application\Manager;

use CrocoPhpCI\Base\Command\GitInterface;
use CrocoPhpCI\Base\Config\StatementConfig;
use CrocoPhpCI\Base\Manager\ManagerInterface;
use CrocoPhpCI\Base\Statement\FileInterface;

class FileDiffManager
    extends AbstractManager
    implements ManagerInterface
{
    /**
     * @var array
     */
    protected $statementList = array();

    /**
     * diff file list
     * @var array
     */
    protected $fileList = array();

    /**
     * @var GitInterface
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
     * initialisation process make it your
     *
     * @return $this
     */
    public function init()
    {
        $this->sortStatements();

        $this->setCommandLine($this->project->getGit());

        $this->fileList =  $this->command->diff($this->commit->getOldRef() , $this->commit->getNewRef());
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

            foreach($this->fileList as $file) {

                $result = $statement->setAction($file[0])
                    ->setFileName($file[1])
                    ->run();

                if($result === false) {
                    $outPut = false;
                }

            }
        }
        return $outPut;
    }


}