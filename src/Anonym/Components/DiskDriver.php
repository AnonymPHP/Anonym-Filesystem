<?php
/**
 * Created by PhpStorm.
 * User: va
 * Date: 07.08.2015
 * Time: 00:02
 */

namespace Anonym\Components\Filesystem;

/**
 * Class DiskDriver
 * @package Anonym\Components\Filesystem
 */
class DiskDriver extends Driver implements DriverInterface
{


    /**
     * Dosyan�n olup olmad���n� kontrol eder
     *
     * @param string $name
     * @return mixed
     */
    public function exists($name = '')
    {
    }

    /**
     * Dosyan�n i�eri�ini okur
     *
     * @param string $name
     * @return mixed
     */
    public function read($name = '')
    {

    }

    /**
     * Dosyan�n i�eri�inin sonuna veri eklemesi yapar
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function append($name = '', $text = '')
    {

    }

    /**
     * Dosyan�n i�eri�inin ba��na veri ekler
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function prepend($name = '', $text = '')
    {

    }

    /**
     * Dosyan�n i�eri�ini tamamen de�i�tirir
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function write($name = '', $text = '')
    {

    }

    /**
     * Dosyay� siler
     *
     * @param string $name
     * @return mixed
     */
    public function delete($name = '')
    {

    }

    /**
     * Klas�r� siler
     *
     * @param string $name
     * @return mixed
     */
    public function deleteDir($name = '')
    {

    }

    /**
     * Dosyay� kopyalar
     *
     * @param string $src
     * @param string $dest
     * @return mixed
     */
    public function move($src = '', $dest = '')
    {

    }

    /**
     * S�n�f� ba�lat�r ve gerekli i�lemleri �a��r�r
     *
     * @return mixed
     */
    public function boot()
    {

    }

    /**
     * S�r�c�n�n kullan�labilir olup olmad���na bakar
     *
     * @return bool
     */
    public function check()
    {
        return true;
    }
}
