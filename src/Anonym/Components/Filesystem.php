<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Components\Filesystem;

    /**
     * Class Filesystem
     * @package Anonym\Components\Filesystem
     */
    class Filesystem
    {

        /**
         * @var DriverInterface
         */
        private $driver;


        /**
         * @var array
         */
        private $driverList;

        /**
         * Sınıfı başlatır ve seçilen driver ı ayarlar
         *
         * @param string $driver
         */
        public function __construct($driver = '')
        {

        }

        /**
         * @return DriverInterface
         */
        public function getDriver()
        {
            return $this->driver;
        }

        /**
         * @param DriverInterface $driver
         * @return Filesystem
         */
        public function setDriver($driver)
        {
            $this->driver = $driver;

            return $this;
        }

        /**
         * @return array
         */
        public function getDriverList()
        {
            return $this->driverList;
        }

        /**
         * @param array $driverList
         * @return Filesystem
         */
        public function setDriverList($driverList)
        {
            $this->driverList = $driverList;

            return $this;
        }



    }
