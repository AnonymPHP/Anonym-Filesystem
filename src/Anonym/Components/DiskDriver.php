<?php
/**
 * Created by PhpStorm.
 * User: va
 * Date: 07.08.2015
 * Time: 00:02
 */

namespace Anonym\Components\Filesystem;
use Anonym\Components\Filesystem\Exceptions\FileNotFoundException;

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
        return file_exists($name);
    }

    /**
     * @param string $name
     * @return bool|string
     * @throws FileNotFoundException
     */
    public function read($name = '')
    {
        if ($this->exists($name)) {

            if ($this->isReadable($name)) {
                    $open = fopen($name, 'r');
                    $read = fgetss($open, filesize($name));
                    fclose($open);
                    return $read;
            } else {
                return false;
            }

        } else {

            throw new FileNotFoundException(
                sprintf('Girdiðiniz %s dosyasý bulunamadý', $name)
            );
        }
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
        return $this->write($name, $text, 'a');
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
        $content = $text.$this->read($name);
        $this->write($name, $content);
        return $this;

    }

    /**
     * Dosyanýn okunabilir olup olmadýðýna bakar
     *
     * @param string $fileName
     * @return bool
     */
    public function isReadable($fileName = '')
    {
        return is_readable($fileName);
    }


    /**
     * Dosyanýn yazýlabilir olduðuna bakar
     *
     * @param string $fileName
     * @return bool
     */
    public function isWriteable($fileName = '')
    {
        return is_writeable($fileName);
    }

    /**
     * Dosyanýn içeriðini tamamen deðiþtirir
     *
     * @param string $name
     * @param string $text
     * @param string $mode
     * @return mixed
     */
    public function write($name = '', $text = '', $mode = 'w')
    {

        if ($handle = fopen($name, $mode)) {
            fwrite($handle, $text);
            fclose($handle);

            return true;
        }
        return false;

    }

    /**
     * Dosyayý siler
     *
     * @param string $name
     * @return mixed
     */
    public function delete($name = '')
    {
        return unlink($name);
    }

    /**
     * Klasörü siler
     *
     * @param string $name
     * @return mixed
     */
    public function deleteDir($name = '')
    {
        return rmdir($name);
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
     * $filepath ile girilen yola $mode deðiþkenindeki izinleri atar
     *
     * @param string $filePath
     * @param int $mode
     * @throws Exception
     * @return bool
     */
    public function chmod($filePath = '', $mode = 0777)
    {
        if(!is_string($filePath))
        {
            throw new Exception(sprintf('%s fonksiyonunda girdiðiniz isim string olmalýdýr', __FUNCTION__));
        }

        if (true === $this->exists($filePath)) {

            return chmod($filePath, $mode);
        }
    }

    /**
     * Sýnýfý baþlatýr ve gerekli iþlemleri çaðýrýr
     *
     * @return mixed
     */
    public function boot()
    {
        //
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
