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
     * Interface DriverInterface
     * @package Anonym\Components\Filesystem
     */
    interface DriverInterface
    {

        /**
         * Sınıfı başlatır ve gerekli işlemleri çağırır
         *
         * @return mixed
         */

        public function boot();

        /**
         * Sürücünün kullanılabilir olup olmadığına bakar
         *
         * @return bool
         */
        public function check();

    }

