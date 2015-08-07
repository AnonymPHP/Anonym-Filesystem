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
 * Class Driver
 * @package Anonym\Components\Filesystem
 */
abstract class Driver
{

    /**
     * Dosyanın olup olmadığını kontrol eder
     *
     * @param string $name
     * @return mixed
     */
    abstract public function exists($name = '');

    /**
     * Dosyan�n i�eri�ini okur
     *
     * @param string $name
     * @return mixed
     */
    abstract public function read($name = '');

    /**
     * Dosyanın içeriğinin sonuna veri eklemesi yapar
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function append($name = '', $text = '');


    /**
     * Dosyanın içeriğin başına  veri ekler
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function prepend($name = '', $text = '');

    /**
     * Dosyanın içeriğini tamamen değiştirir
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function write($name = '', $text = '');

    /**
     * Dosyayı siler
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
     * Dosyayı kopyalar
     *
     * @param string $src
     * @param string $dest
     * @return mixed
     */
    abstract public function move($src = '', $dest = '');
}
