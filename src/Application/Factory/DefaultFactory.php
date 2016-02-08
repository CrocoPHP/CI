<?php
/**
 * default object factory
 */


namespace CrocoPhpCI\AbstractClass\Factory;

class DefaultFactory
{

    /**
     * create a new instance of $className if exists
     *
     * @param string $className
     * @throws \InvalidArgumentException
     */
    public function __invoke($className) {

        if(class_exists($className)) {

            $instance = new $className();

            if(method_exists( $instance , 'setFactory')) {
                $instance->setFactory($this);
            }

            return $instance;

        }

        throw new \InvalidArgumentException('unable to load ' . $className);

    }


}