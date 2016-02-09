<?php
/**
 * your global ci configuration
 */

namespace CrocoPhpCI\Base;

/**
 * configuration is immutable
 *
 * Interface ConfigInterface
 * @package CrocoPhpCI\Base
 */
interface ConfigInterface
{

    /**
     * return application factory
     * @return callable
     */
    public function getFactory();

    /**
     * A reporter config class instance
     *
     * @return array
     */
    public function getReporter();

    /**
     * set the command line helper class name to use in your Ci application
     *
     * @return string
     */
    public function getCommandLine();

    /**
     * it use the repository name like demo.git
     * this is use to get project config from commit
     *
     * it must be stored as
     *
     * ['demo.git' => new Project(....), 'project.git' => new Project(....), .....]
     *
     * @param string $repositoryName
     * @return ProjectInterface
     */
    public function getProject($repositoryName);

    /**
     * return handler class name
     *
     * @return string
     */
    public function getHandler();
}