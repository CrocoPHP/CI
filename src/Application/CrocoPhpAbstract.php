<?php
/**
 * base of all classes
 */

namespace CrocoPhpCI\Application;

use CrocoPhpCI\Base\CommandInterface;
use CrocoPhpCI\Base\CommitInterface;
use CrocoPhpCI\Base\CrocoPhpInterface;
use CrocoPhpCI\Base\ProjectInterface;
use CrocoPhpCI\Base\Report\ReporterInterface;

/**
 * Class CrocoPhpAbstract
 * @package CrocoPhpCI\AbstractClass
 */
class CrocoPhpAbstract implements CrocoPhpInterface {

    /**
     * @var ReporterInterface
     */
    protected $reporter;

    /**
     * @var ProjectInterface
     */
    protected $project;

    /**
     * @var CommitInterface
     */
    protected $commit;

    /**
     * @var CommandInterface
     */
    protected $command;

    /**
     * @var callable
     */
    protected $factory;
    /**
     * @inheritdoc
     */
    public function setReporter(ReporterInterface $reporter)
    {
        $this->reporter = $reporter;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getReporter()
    {
        return $this->reporter;
    }

    /**
     * set up the current project
     *
     * @param ProjectInterface $project
     * @return $this
     */
    public function setProject(ProjectInterface $project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * set up the current commit
     *
     * @param CommitInterface $commit
     * @return $this
     */
    public function setCommit(CommitInterface $commit)
    {
        $this->commit = $commit;
        return $this;
    }

    /**
     * return current project
     *
     * @return ProjectInterface
     */
    public function getProject()
    {
       return $this->project;
    }

    /**
     * return the current commit
     *
     * @return CommitInterface
     */
    public function getCommit()
    {
        $this->commit;
    }

    /**
     * set up the command line interface use by the statement
     *
     * @param CommandInterface $command
     * @return $this
     */
    public function setCommandLine(CommandInterface $command)
    {
        $this->command = $command;
        return $this;
    }

    /**
     * return the command line interface use by the statement
     *
     * @return CommandInterface
     */
    public function getCommandLine()
    {
        $this->command;
    }

    /**
     * set up object factory
     *
     * @param callable $factory
     * @return $this
     */
    public function setFactory(callable $factory)
    {
        $this->factory = $factory;
        return $this;
    }

    /**
     * return pbject factory
     *
     * @return callable
     */
    public function getFactory()
    {
        return $this->factory ;
    }


}

