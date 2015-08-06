<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadýr.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */

namespace Anonym\Components\Filesystem;

/**
 * Class Driver
 * @package Anonym\Components\Filesystem
 */
abstract class Driver
{

    /**
     * Dosyanýn olup olmadýðýný kontrol eder
     *
     * @param string $name
     * @return mixed
     */
    abstract public function exists($name = '');

    /**
     * Dosyanýn içeriðini okur
     *
     * @param string $name
     * @return mixed
     */
    abstract public function read($name = '');

    /**
     * Dosyanýn içeriðinin sonuna veri eklemesi yapar
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function append($name = '', $text = '');


    /**
     * Dosyanýn içeriðinin baþýna veri ekler
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function prepend($name = '', $text = '');

    /**
     * Dosyanýn içeriðini tamamen deðiþtirir
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function write($name = '', $text = '');

    /**
     * Dosyayý siler
     *
     * @param string $name
     * @return mixed
     */
    abstract public function delete($name = '');


    /**
     * Klasörü siler
     *
     * @param string $name
     * @return mixed
     */
    abstract public function deleteDir($name = '');


    /**
     * Dosyayý kopyalar
     *
     * @param string $src
     * @param string $dest
     * @return mixed
     */
    abstract public function move($src = '', $dest = '');
}