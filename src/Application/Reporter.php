<?php
/**
 * basic reporter
 */

namespace CrocoPhpCI\Application;

use CrocoPhpCI\Base\Report\ElementInterface;
use CrocoPhpCI\Base\Report\ReporterInterface;
use CrocoPhpCI\Base\Report\WriterInterface;

/**
 * Class Reporter
 * @package CrocoPhpCI\Application
 */
class Reporter extends CrocoPhpAbstract implements ReporterInterface
{

    /**
     * array of all stored report elements
     *
     * @var array
     */
    protected $elements = array();

    /**
     * @var array writer array like
     *
     * array(
     *      'file' =>       WriterInterface instance,
     *      'mail' =>       WriterInterface instance,
     *      .....
     * );
     */
    protected $writers = array();

    /**
     * add a new Writer to reporter
     *
     * @param string $name
     * @param WriterInterface $writer
     * @return $this
     */
    public function addWriter($name, WriterInterface $writer)
    {
        $this->writers[$name] = $writer;
        return $this;
    }

    /**
     * return a Writer specified by his name
     *
     * @param string $name
     * @return WriterInterface
     */
    public function getWriter($name)
    {
        if(array_key_exists($name , $this->writers)) {
            return $this->writers[$name];
        }
        return null;
    }

    /**
     * init the reporter
     *
     * @return $this
     */
    public function init()
    {
        $this->reset();
    }

    /**
     * add a new element to report pool
     *
     * @param mixed $element
     * @return $this
     */
    public function addElement(ElementInterface $element)
    {

        $this->elements[] = $element;
        return $this;
    }

    /**
     * add a list of element to the report pool
     *
     * each element MUST be an ElementInterface
     *
     * @throw \InvalidArgumentException
     * @param array $reports
     * @return $this
     */
    public function addToReport(array $reports)
    {
        /**
         * @var ElementInterface $element
         */
        foreach($reports as $element) {

            if(!is_a($element , '\CrocoPhpCI\Base\Report\ElementInterface')) {
                throw new \InvalidArgumentException('invalid type of element');
            }
            $this->elements[] = $element;

        }
        return $this;
    }

    /**
     * reset the report pool
     *
     * @return $this
     */
    public function reset()
    {
        $this->elements = array();
    }

    /**
     * save the report pool into file or database etc ....
     *
     * @return $this
     */
    public function save()
    {
        /**
         * @var WriterInterface $writer
         */
        foreach($this->writers as $writer) {
            $writer->save($this->elements);
        }

        return $this;
    }


}