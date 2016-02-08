<?php
/**
 * fast diff CI bootstrap
 */
namespace CrocoPhpCI\Base;

/**
 * Interface FastCIInterface
 * @package CrocoPhpCI\Base
 */
interface FastCIInterface extends CrocoPhpInterface
{

    /**
     * load config and set up CI process :
     *  Project, Handler, Reporter, Command, ect ....
     *
     * @param ConfigInterface $config
     * @return $this
     */
    public function setConfig(ConfigInterface $config);

    /**
     * handle params to set up commit class
     *
     * @return $this
     */
    public function handle();

    /**
     * run all configured managers for project
     * return false if validation or build failed
     *
     * @return bool;
     */
    public function run();

    /**
     * execute save of all reporters
     *
     * @return $this
     */
    public function report();

}