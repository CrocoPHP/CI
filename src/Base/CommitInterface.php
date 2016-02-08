<?php
/**
 * commit interface
 */

namespace CrocoPhpCI\Base;

/**
 * Interface CommitInterface
 * @package CrocoPhpCI\Base
 */
interface CommitInterface {

    public function getNewRef();

    public function getOldRef();

    public function getCommitterName();

    public function getCommitterEmail();

    public function getMessage();

    public function getRepositoryName();

}