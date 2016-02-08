<?php
/**
 * reporter interface
 *
 * used to create new reporters file, database, json, xml .....
 *
 * as you wish
 */

namespace CrocoPhpCI\Base\Report;

use CrocoPhpCI\Base\Config\ReportConfig;
use CrocoPhpCI\Base\CrocoPhpInterface;

/**
 * Interface ReportInterface
 * @package CrocoPhpCI\Base\Report
 */
interface ReporterInterface extends CrocoPhpInterface
{

    /**
     * init the reporter
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
     * add a new element to report pool
     *
     * @param mixed $element
     * @return $this
     */
    public function addElement(ElementInterface $element);

    /**
     * add a list of element to the report pool
     *
     * each element MUST be an ElementInterface
     *
     * @throw \InvalidArgumentException
     * @param array $reports
     * @return $this
     */
    public function addToReport(array $reports);

    /**
     * reset the report pool
     *
     * @return $this
     */
    public function reset();

    /**
     * save the report pool into file or database etc ....
     *
     * @return $this
     */
    public function save();

}