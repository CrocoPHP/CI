<?php
/**
 * extend config to create your own
 * CI process
 *
 */

namespace CrocoPhpCI\Application;

use CrocoPhpCI\Base\ConfigInterface;
use CrocoPhpCI\Base\ProjectInterface;

/**
 * Class ConfigAbstract
 * @package CrocoPhpCI\Application
 */
abstract class ConfigAbstract implements ConfigInterface
{
    /**
     * handler className
     * @var string
     */
    protected $handler = '';
    /**
     * @var callable
     */
    protected $factory;
    /**
     * list of reporters className like :
     *
     * array(
     *    '\Namespace\Reporter\MyReporterOne' =>  ,
     *    '\Namespace\Reporter\MyReporterTwo', ....
     * );
     *
     * @var array
     */
    protected $reporters = array();

    /**
     * command line helper className
     *
     * @var string
     */
    protected $commandLine = '';

    /**
     *
     * list of configurated projects
     *
     * array('demo.git' => new Project(....), 'project.git' => new Project(....), .....);
     *
     * @var array
     */
    protected $projects = array();

    /**
     * return reporter class name list
     * reporters class name list like :
     *
     * array(
     *    '\Namespace\Reporter\MyReporterOne' ,
     *    '\Namespace\Reporter\MyReporterTwo', ....
     * );
     *
     *
     * @return array
     */
    public function getReporterList()
    {
        return $this->reporters;
    }

    /**
     * set the command line helper class name to use in your Ci application
     *
     * @return string
     */
    public function getCommandLine()
    {
        return $this->commandLine;
    }

    /**
     * it use the repository name like demo.git
     * this is use to get project config from commit
     *
     * it must be stored as
     *
     * ['demo.git' => new Project(....), 'project.git' => new Project(....), .....]
     *
     * return null if project isn't configured
     *
     * @param string $repositoryName
     * @return ProjectInterface|null
     */
    public function getProject($repositoryName)
    {
        if(array_key_exists($repositoryName , $this->projects)) {
            return $this->projects[$repositoryName];
        }

        return null;
    }

    /**
     * return default application factory
     * @return callable
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * return application handler
     *
     * return string;
     */
    public function getHandler() {
        return $this->handler;
    }
}