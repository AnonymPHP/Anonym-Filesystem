<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyad�r.
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
     * Dosyan�n olup olmad���n� kontrol eder
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
     * Dosyan�n i�eri�inin sonuna veri eklemesi yapar
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function append($name = '', $text = '');


    /**
     * Dosyan�n i�eri�inin ba��na veri ekler
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function prepend($name = '', $text = '');

    /**
     * Dosyan�n i�eri�ini tamamen de�i�tirir
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    abstract public function write($name = '', $text = '');

    /**
     * Dosyay� siler
     *
     * @param string $name
     * @return mixed
     */
    abstract public function delete($name = '');


    /**
     * Klas�r� siler
     *
     * @param string $name
     * @return mixed
     */
    abstract public function deleteDir($name = '');


    /**
     * Dosyay� kopyalar
     *
     * @param string $src
     * @param string $dest
     * @return mixed
     */
    abstract public function move($src = '', $dest = '');
}