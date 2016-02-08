<?php
/**
 * statement is executed on one file for each time
 *
 */
namespace CrocoPhpCI\Base\Statement;
use CrocoPhpCI\Base\CrocoPhpInterface;

/**
 * Interface StatementInterface
 * @package phpCI\Statement
 */
interface FileInterface extends StatementInterface
{
    /**
     * set the git action A M or D
     *
     * @param string $action
     * @return $this
     */
    public function setAction($action);

    /**
     * set relative fileName form the project directory
     *
     * @param $fileName
     * @return $this
     */
    public function setFileName($fileName);

    /**
     * set pattern for preg_match using to detect if file
     * can work with valid method
     * pattern must have separators and flags like :
     *
     * #(Symfony|Zend|Vendor)#gi
     *
     * @param string
     * @return $this
     */
    public function setNeedlePattern($pattern);

    /**
     * return pattern for preg_match using to detect if file
     * can work with valid method
     *
     * @return string
     */
    public function getNeedlePattern();

    /**
     * set pattern for preg_match to detect  excluded files
     * pattern must have separators and flags like :
     *
     * #(Symfony|Zend|Vendor)#gi
     * @param string $pattern
     * @return $this
     */
    public function setExcludePattern($pattern);

    /**
     * return pattern for preg_match to detect  excluded files
     * pattern must have separators and flags like :
     *
     * #(Symfony|Zend|Vendor)#gi
     *
     * @return string
     */
    public function getExcludePattern();

    /**
     * execute the statement process
     *
     * return true the file is valid
     * or false if the file isn't valid
     *
     * if this method return false, the package Must bo blocked
     *
     * @param $fileName
     * @return bool
     */
    public function valid($fileName);

}