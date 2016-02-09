<?php
/**
 *
 */

namespace CrocoPhpCI\Application;

use CrocoPhpCI\Base\CommandInterface;
use CrocoPhpCI\Base\Config\ManagerConfig;
use CrocoPhpCI\Base\ConfigInterface;
use CrocoPhpCI\Base\FastCIInterface;
use CrocoPhpCI\Base\HandlerInterface;
use CrocoPhpCI\Base\Manager\ManagerInterface;
use CrocoPhpCI\Base\Report\ReporterInterface;

class BootStrap extends CrocoPhpAbstract implements FastCIInterface
{
    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * @inheritdoc
     */
    public function setConfig(ConfigInterface $config)
    {
        $this->config = $config;

        $this->factory = $config->getFactory();

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function handle()
    {
        /**
         * @var callable
         */
        $factory = ($this->getFactory());
        /**
         * @var HandlerInterface $handler
         */
        $handler = $factory($this->config->getHandler());

        $this->commit = $handler->handle();

        return $this;
    }

    /**
     * reporters factory
     *
     * @return $this
     */
    protected function initReporters() {

        $factory = ($this->getFactory());

        $reporterList =  $this->config->getReporter();

        foreach($reporterList as $className => $reporterConfig) {

            /**
             * @var ReporterInterface $reporter
             */
            $reporter = $factory($className);
            $reporter->setOptions($reporterConfig)
                ->setCommit($this->commit)
                ->setCommandLine($this->command)
                ->setFactory($this->factory)
                ->setProject($this->project)
                ->init();

            $this->reporters[] = $reporter;
        }

        return $this;

    }

    /**
     * return new configured manager
     *
     * @param $className
     * @param array $statementList
     * @return ManagerInterface
     */
    protected function createManager($className, array $statementList) {

        /**
         * @var callable
         */
        $factory = ($this->getFactory());

        /**
         * @var ManagerInterface $manager
         */
        $manager = $factory($className);

        $manager->setCommit($this->commit)
            ->setCommandLine($this->command)
            ->setFactory($factory)
            ->setProject($this->project)
            ->setStatementList($statementList);

        return $manager;
    }

    /**
     *
     * sort manager list by piority
     *
     * @param array $managerList
     * @return bool
     */
    protected function sortManagerList(array &$managerList) {

        return usort($managerList , function(ManagerConfig $a, ManagerConfig $b)
        {
            if ($a->getPriority() == $b->getPriority()) {
                return 0;
            }
            return ($a->getPriority() < $b->getPriority()) ? -1 : 1;
        });

    }

    /**
     * process manager list
     *
     * @param array $list
     * @return bool
     */
    protected function runManagers(array $list) {

        $continueProcess = true;

        $this->sortManagerList($build);

        /**
         * @var ManagerConfig $config
         */
        foreach($list as $config) {

            $result = $this->createManager($config->getClassName() , $config->getStatementList() )
                ->execute();

            if($result === false) {
                $continueProcess = false;
            }

        }

        return $continueProcess;

    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        /**
         * @var callable
         */
        $factory = ($this->getFactory());
        /**
         * @var CommandInterface $command
         */
        $this->command = $factory($this->config->getCommandLine());
        $this->project = $factory($this->config->getProject($this->commit->getRepositoryName()));
        $this->initReporters();

        if($this->runManagers($this->getProject()->getValidationManager())) {

            return $this->runManagers($this->getProject()->getBuildManager());

        }

        return false;

    }

    /**
     * @inheritdoc
     */
    public function report()
    {
        /**
         * @var ReporterInterface $reporter
         */
        foreach($this->reporters as $reporter) {
            $reporter->save();
        }
        return $this;
    }

}

