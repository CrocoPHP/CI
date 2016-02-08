<?php
/**
 * use for statements must be processed on full applications
 * Like unit testing or functional testing
 *
 * Can be used for packaging process
 *
 */
namespace CrocoPhpCI\Base\Statement;

/**
 * Interface ApplicationStatement
 * @package CrocoPhpCI\Base\Statement
 */
interface ApplicationStatement extends StatementInterface
{
    /**
     * add a new option flag into flags array
     *
     * @param string $optionFlag
     * @return $this
     */
    public function addCommandOption($optionFlag);

    /**
     * return additional command flags
     * @return array
     */
    public function getCommandOptions();

}