<?php
/**
 * an interface for command lines executor
 */

namespace CrocoPhpCI\Base;

/**
 * Interface CommandInterface
 * @package CrocoPhpCI\Base
 */
interface CommandInterface {

    /**
     * execute the commandLine string and return true if the command
     * exit with code 0.
     *
     * return false for all others codes
     *
     * @param string $commandLine
     * @return bool
     */
    public function exec($commandLine);

    /**
     * return the last command output
     *
     * @return array
     */
    public function getLastCommandResult();

    /**
     * change current working directory
     *
     * @param $directory
     * @return bool
     */
    public function cd($directory);

}