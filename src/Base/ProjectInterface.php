<?php
/**
 * project config
 */

namespace CrocoPhpCI\Base;
use CrocoPhpCI\Base\Command\GitInterface;

/**
 * Interface ProjectInterface
 * @package CrocoPhpCI\Base
 */
interface ProjectInterface extends CommandInterface {

    /**
     * ProjectInterface constructor.
     * @param string $name
     * @param string $repositoryUri
     * @param array $validationManager
     * @param array $buildManager
     */
    public function __construct($name , $repositoryUri , array $validationManager , array $buildManager);

    /**
     * set the project name this is a custom name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * return project name
     *
     * @return string
     */
    public function getName();

    /**
     * set up full repository uri
     * like git@github.com:CrocoPHP/CI.git
     *
     * @param $uri
     * @return $this
     */
    public function setRepositoryUri($uri);

    /**
     * return repository uri
     * @return string
     */
    public function getRepositoryUri();

    /**
     * return validation manager array
     *
     * @return array
     */
    public function getValidationManager();

    /**
     * A list of manager config like
     *
     * [
     *    new \Namespace\Manager\ManagerConfig(...),
     *    new \Namespace\Manager\ManagerConfig(...), ....
     * ]
     *
     * Validation managers are executed on fist time
     * if result of one of all mamagers return false,
     * build isn't execute
     *
     * @param array $managerList
     * @return $this
     */
    public function setValidationManager(array $managerList);

    /**
     * return build manager array
     *
     * @return array
     */
    public function getBuildManager();

    /**
     *  A list of manager className like
     *
     * [
     *    new \Namespace\Manager\ManagerConfig(...),
     *    new \Namespace\Manager\ManagerConfig(...), ....
     * ]
     *
     * build managers are called if all validation
     * managers have been return true.
     *
     * @param array $managerList
     * @return $this
     */
    public function setBuildManager(array $managerList);

    /**
     * set up git command
     *
     * @param GitInterface $git
     * @return mixed
     */
    public function setGit(GitInterface $git);

    /**
     * return the git command helper
     * @return GitInterface
     */
    public function getGit();

}