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
use Aws\S3\S3Client;

class AwsDriver extends Driver implements DriverInterface, AwsDriverInterface
{

    /**
     * Amazon client' i tutar
     *
     *  @var S3Client
     */
    private $client;


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
        $s3Client = new S3Client($configs);
        $this->setClient($s3Client);

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

    /**
     * @return S3Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param S3Client $client
     * @return AwsDriver
     */
    public function setClient(S3Client $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Yeni bir dosya oluşturur
     *
     * @param string $href
     * @return mixed
     */
    public function create($href = '')
    {

    }

    /**
     * Yeni bir klasör oluşturur
     *
     * @param string $href
     * @return mixed
     */
    public function createDir($href = '')
    {

    }
}
