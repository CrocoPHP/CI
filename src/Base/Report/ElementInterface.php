<?php
/**
 * interface for each report line element
 */

namespace CrocoPhpCI\Base\Report;

/**
 * Interface ElementInterface
 * @package CrocoPhpCI\Base\Report
 */
interface ElementInterface {

    /**
     * return element message string
     *
     * @return string
     */
    public function getMessage();

    /**
     * set a new element message string
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message);

    /**
     * return your custom statement name
     * this can be a file name or a process name
     *
     * @param $statementName
     * @return string
     */
    public function getStatementName($statementName);

    /**
     * set your custom statement name
     * this can be a file name or a process name
     *
     * @param string $statementName
     * @return $this
     */
    public function setStatementName($statementName);

    /**
     * return git commit id
     *
     * @return string
     */
    public function getCommitId();

    /**
     * set git commit id
     *
     * @param string $commitId
     * @return $this
     */
    public function setCommitId($commitId);

    /**
     * set the git user name
     *
     * @param  string $committerName
     * @return $this
     */
    public function setCommitterName($committerName);

    /**
     * return the git user name
     *
     * @return string
     */
    public function getCommitterName();


}