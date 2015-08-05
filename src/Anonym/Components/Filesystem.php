<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Components\Filesystem;
    use InvalidArgumentException;

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

            $this->selectDriver($driver);
        }

        /**
         * Driver seçme işlemini yapra
         *
         * @param string $driver
         * @throws InvalidArgumentException
         */
        public function selectDriver($driver = '')
        {

            if (!is_string($driver)) {
                throw new InvalidArgumentException('SÜrücü isi string olmalıdır');
            }

            if ('' === $driver) {
                throw new InvalidArgumentException('Sürücü ismi boş olamaz');
            }

            $driverList = $this->getDriverList();
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
        public function setDriver(DriverInterface $driver)
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
