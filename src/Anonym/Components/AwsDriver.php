<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */
namespace Anonym\Components\Filesystem;


use Aws\AwsClient;

class AwsDriver extends Driver implements DriverInterface
{


    /**
     * Dosyanın olup olmadığını kontrol eder
     *
     * @param string $name
     * @return mixed
     */
    public function exists($name = '')
    {

    }

    /**
     * Dosyanın içeriğini ni okur
     *
     * @param string $name
     * @return mixed
     */
    public function read($name = '')
    {

    }

    /**
     * Dosyanın içeriğinin sonuna veri eklemesi yapar
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function append($name = '', $text = '')
    {

    }

    /**
     * Dosyanın içeriğin başına  veri ekler
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function prepend($name = '', $text = '')
    {

    }

    /**
     * Dosyanın içeriğini tamamen değiştirir
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function write($name = '', $text = '')
    {

    }

    /**
     * Dosyayı siler
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
     * Dosyayı kopyalar
     *
     * @param string $src
     * @param string $dest
     * @return mixed
     */
    public function move($src = '', $dest = '')
    {

    }

    /**
     * Kurulumu gerçekleştirir
     *
     * @param array $configs
     * @return $this
     */
    public function setup(array $configs = [])
    {

    }

    /**
     * Sınıfı başlatır ve gerekli işlemleri çağırır
     *
     * @return mixed
     */
    public function boot()
    {
        // do nothing
    }

    /**
     * Sürücünün kullanılabilir olup olmadığına bakar
     *
     * @return bool
     */
    public function check()
    {
        if(class_exists(AwsClient::class)){
            return true;
        }else{
            return false;
        }
    }
}
