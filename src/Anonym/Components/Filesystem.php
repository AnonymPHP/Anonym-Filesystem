<?php
    /**
     * Bu Dosya AnonymFramework'e ait bir dosyadır.
     *
     * @author vahitserifsaglam <vahit.serif119@gmail.com>
     * @see http://gemframework.com
     *
     */

    namespace Anonym\Components\Filesystem;
    use Anonym\Components\Filesystem\Exceptions\DriverNotFoundException;
    use Anonym\Components\Filesystem\Exceptions\DriverNotReadyException;
    use Anonym\Components\Filesystem\Exceptions\DriverIsNotReallyDriver;
    use InvalidArgumentException;

    /**
     * Class Filesystem
     * @package Anonym\Components\Filesystem
     */
    class Filesystem
    {

        /**
         *    @var array
         */
        private $driverList;


        /**
         * Sınıfı başlatır ve seçilen driver ı ayarlar
         *
         * @param string $driver
         */
        public function __construct($driver = null)
        {

        }
    }
