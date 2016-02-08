<?php
/**
 * set up your own handler !
 * transform entry point data into commit object
 *
 * this is made to standardise every protocol with CrocoPhpCi
 */

namespace CrocoPhpCI\Base;
/**
 * Interface HandlerInterface
 * @package CrocoPhpCI\Base
 */
interface HandlerInterface
{
    /**
     * enjoy your entry point formatting
     *
     * it can be from CLI, Environment, REST API , POST, GET, SOAP, ect ....
     *
     * @throws \InvalidArgumentException
     * @return CommitInterface
     */
    public function handle();

}