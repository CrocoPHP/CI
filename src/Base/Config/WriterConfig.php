<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 08/02/16
 * Time: 07:35
 */

namespace CrocoPhpCI\Base\Config;
/**
 * Interface WriterConfig
 * @package CrocoPhpCI\Base\Config
 */
interface WriterConfig {

    /**
     * full Writer class Name
     *
     * @return string
     */
    public function getClassName();

    /**
     * all custom options
     *
     * @return array
     */
    public function getOptions();

}