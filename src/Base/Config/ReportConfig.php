<?php
/**
 * reporter creation options
 */

namespace CrocoPhpCI\Base\Config;

/**
 * Interface ReportConfig
 * @package CrocoPhpCI\Base\Config
 */
interface ReportConfig {
    /**
     * ReportConfig constructor.
     * @param $name
     * @param $className
     * @param array $writerConfig
     */
    public function __construct($name , $className , array $writerConfig);

    /**
     * return reporter full className
     *
     * @return string
     */
    public function getClassName();
    /**
     * return reporter custom name
     * @return string
     */
    public function getName();
    /**
     * return an array of
     * WriterConfig
     *
     * @return array
     */
    public function getWriters();

}