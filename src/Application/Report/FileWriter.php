<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 08/02/16
 * Time: 22:06
 */

namespace CrocoPhpCI\Application\Report;

use CrocoPhpCI\Base\Config\ReportConfig;
use CrocoPhpCI\Base\Config\WriterConfig;
use CrocoPhpCI\Base\Report\ElementInterface;
use CrocoPhpCI\Base\Report\WriterInterface;

class FileWriter implements WriterInterface
{
    /**
     * file open options
     *
     * array(
     *     'filePath' => '',
     *     'mode'     => 'a',
     * );
     *
     * @var array
     */
    protected $options = array();
    /**
     * init the writer
     *
     * something like open or touch a new file
     * open database connection etc ....
     *
     * @return $this
     */
    public function init()
    {

        if(!array_key_exists('filePath' , $this->options)) {
            throw new \InvalidArgumentException('required option filePath');
        }

        if(!array_key_exists('mode' , $this->options)) {
            $this->options['mode'] = 'a';
        }

        return $this;
    }

    /**
     * set up custom options to init reporter
     *
     * @param ReportConfig $options
     * @return $this
     */
    public function setOptions(WriterConfig $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * return full options array
     *
     * @return array
     */
    public function getOptions()
    {
        return $this;
    }

    /**
     * save an array of ElementInterface from reporter
     *
     *
     * @throws \RuntimeException
     * @param array $element
     * @return bool
     */
    public function save(array $element)
    {
        $stream = fopen($this->options['filePath']  , $this->options['mode'] );
        /**
         * @var ElementInterface $item
         */
        foreach($element as $item)  {
            $line = date('c') . ' ' . $item->getStatementName() . ' ' . $item->getCommitId() . ' ' . $item->getCommitterName() . ' ' . $item->getMessage();
            fwrite($stream , $line);
        }
        fclose($stream);
        return $this;
    }

}