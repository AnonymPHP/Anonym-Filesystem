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
     * Dosyanýn olup olmadýðýný kontrol eder
     *
     * @param string $name
     * @return mixed
     */
    public function exists($name = '')
    {
    }

    /**
     * Dosyanýn içeriðini okur
     *
     * @param string $name
     * @return mixed
     */
    public function read($name = '')
    {

    }

    /**
     * Dosyanýn içeriðinin sonuna veri eklemesi yapar
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function append($name = '', $text = '')
    {

    }

    /**
     * Dosyanýn içeriðinin baþýna veri ekler
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function prepend($name = '', $text = '')
    {

    }

    /**
     * Dosyanýn içeriðini tamamen deðiþtirir
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function write($name = '', $text = '')
    {

    }

    /**
     * Dosyayý siler
     *
     * @param string $name
     * @return mixed
     */
    public function delete($name = '')
    {

    }

    /**
     * Klasörü siler
     *
     * @param string $name
     * @return mixed
     */
    public function deleteDir($name = '')
    {

    }

    /**
     * Dosyayý kopyalar
     *
     * @param string $src
     * @param string $dest
     * @return mixed
     */
    public function move($src = '', $dest = '')
    {

    }

    /**
     * Sýnýfý baþlatýr ve gerekli iþlemleri çaðýrýr
     *
     * @return mixed
     */
    public function boot()
    {

    }

    /**
     * Sürücünün kullanýlabilir olup olmadýðýna bakar
     *
     * @return bool
     */
    public function check()
    {
        return true;
    }
}
