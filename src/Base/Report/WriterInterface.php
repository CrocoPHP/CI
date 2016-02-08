<?php
/**
 * writer interface
 *
 * used to create new reporters file, database, json, xml .....
 *
 * as you wish
 */
namespace CrocoPhpCI\Base\Report;

use CrocoPhpCI\Base\Config\ReportConfig;

/**
 * Interface WriterInterface
 * @package CrocoPhpCI\Base\Report
 */
interface WriterInterface {

    /**
     * init the writer
     *
     * something like open or touch a new file
     * open database connection etc ....
     *
     * @return $this
     */
    public function init();
    /**
     * set up custom options to init reporter
     *
     * @param ReportConfig $options
     * @return $this
     */
    public function setOptions(ReportConfig $options);

    /**
     * return full options array
     *
     * @return array
     */
    public function getOptions();

    /**
     * save an array of ElementInterface from reporter
     *
     *
     * @throws \RuntimeException
     * @param array $element
     * @return bool
     */
    public function save(array $element);

}