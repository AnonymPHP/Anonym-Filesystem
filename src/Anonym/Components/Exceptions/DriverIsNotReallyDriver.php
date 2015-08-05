<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Components\Filesystem\Exceptions;
    use Exception;
    /**
     * Class DriverIsNotReallyDriver
     * @package Anonym\Components\Filesystem\Exceptions
     */
    class DriverIsNotReallyDriver extends Exception
    {

        /**
         * İstisnayı oluşturur
         *
         * @param string $message
         */
        public function __construct($message = '')
        {
            $this->message = $message;
        }
    }
