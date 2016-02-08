<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 06/02/16
 * Time: 22:02
 */
namespace CrocoPhpCI\Base\Command;

use CrocoPhpCI\Base\CommandInterface;

interface GitInterface extends CommandInterface
{
    /**
     * clone the project from uri
     * (don't forget to set up credentials)
     *
     * return command line
     *
     * @param string $uri
     * @return bool
     */
    public function cloneProject($uri);

    /**
     * return git diff between two ref.
     * or false if it fail
     *
     * @param $oldRef
     * @param $newRef
     * @return array|bool
     */
    public function diff($oldRef, $newRef);

    /**
     * pull branch
     *
     * @return bool
     */
    public function pull();

    /**
     * switch to branchName
     *
     * @param $branchName
     * @return bool
     */
    public function branch($branchName);

    /**
     * fetch from origin
     *
     * @return bool
     */
    public function fetch();

}