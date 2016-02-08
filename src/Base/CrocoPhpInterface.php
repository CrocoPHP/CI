<?php
/**
 * base for all crocophp CI classes
 */

namespace CrocoPhpCI\Base;
use CrocoPhpCI\Base\Report\ReporterInterface;

/**
 * Interface CrocoPhpInterface
 * @package CrocoPhpCI\Base
 */
interface CrocoPhpInterface {

    /**
     * add a new Reporter
     *
     * @param string $name
     * @param ReporterInterface $reporter
     * @return $this
     */
    public function addReporter($name , ReporterInterface $reporter);

    /***
     * set up full reporters array like :
     *
     * array(
     *      'mail' => MailReporter Instance,
     *      'file' => FileReporter Instance,
     *       ......
     * );
     *
     * @param array $reporters
     * @return $this
     */
    public function setReporters(array $reporters);

    /**
     * get the reporter by name
     *
     * @param $name
     * @return ReporterInterface
     */
    public function getReporter($name);

    /**
     * set up the current project
     *
     * @param ProjectInterface $project
     * @return $this
     */
    public function setProject(ProjectInterface $project);

    /**
     * set up the current commit
     *
     * @param CommitInterface $commit
     * @return $this
     */
    public function setCommit(CommitInterface $commit);

    /**
     * return current project
     *
     * @return ProjectInterface
     */
    public function getProject();

    /**
     * return the current commit
     *
     * @return CommitInterface
     */
    public function getCommit();

    /**
     * set up the command line interface use by the statement
     *
     * @param CommandInterface $command
     * @return $this
     */
    public function setCommandLine(CommandInterface $command);

    /**
     * return the command line interface use by the statement
     *
     * @return CommandInterface
     */
    public function getCommandLine();

    /**
     * set up object factory
     *
     * @param callable $factory
     * @return $this
     */
    public function setFactory(callable $factory);

    /**
     * return pbject factory
     *
     * @return callable
     */
    public function getFactory();
}