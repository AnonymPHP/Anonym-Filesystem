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
    use Anonym\Components\Filesystem\Exceptions\DriverIsNotReallyDriver;
    use InvalidArgumentException;

    /**
     * Class Filesystem
     * @package Anonym\Components\Filesystem
     */
    class Filesystem implements FilesystemInterface
    {

        /**         * @var DriverInterface
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
         * @param string $driver
         * @return $this
         * @throws DriverIsNotReallyDriver
         * @throws DriverNotFoundException
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
            if (isset($driverList[$driver])) {
                $driver = $driverList[$driver];
                if($driver instanceof DriverInterface && $driver instanceof Driver){

                    if ($driver->check()) {
                        $this->setDriver($driver);
                        return $this;
                    }else{

                    }
                }else{
                    throw new DriverIsNotReallyDriver(sprintf('%s sınıfınız gerçek bir sürücü değil', get_class($driver)));
                }
            }else{
                throw new DriverNotFoundException(sprintf('%s isminde bir sürücü bulunamadı', $driver));
            }
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

        /**
         * Sınıfa veri ekler
         *
         * @param string $name
         * @param null $instance
         * @return $this
         */
        public function add($name = '', $instance= null)
        {

            if(null === $instance){
                throw new InvalidArgumentException('Boş bir değeri sürücü listenize ekleyemeyiz');
            }

            $this->driverList[$name] = $instance;
            return $this;
        }

        /**
         * Driver seçer
         *
         * @param string $driver
         * @return Filesystem
         * @throws DriverIsNotReallyDriver
         * @throws DriverNotFoundException
         */
        public function driver($driver = '')
        {
           return  $this->selectDriver($driver);
        }

    }
