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
     * Dosyan�n olup olmad���n� kontrol eder
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
                sprintf('Girdi�iniz %s dosyas� bulunamad�', $name)
            );
        }
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
        return $this->write($name, $text, 'a');
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
        $content = $text.$this->read($name);
        $this->write($name, $content);
        return $this;

    }

    /**
     * Dosyan�n okunabilir olup olmad���na bakar
     *
     * @param string $fileName
     * @return bool
     */
    public function isReadable($fileName = '')
    {
        return is_readable($fileName);
    }


    /**
     * Dosyan�n yaz�labilir oldu�una bakar
     *
     * @param string $fileName
     * @return bool
     */
    public function isWriteable($fileName = '')
    {
        return is_writeable($fileName);
    }

    /**
     * Dosyan�n i�eri�ini tamamen de�i�tirir
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
     * Dosyay� siler
     *
     * @param string $name
     * @return mixed
     */
    public function delete($name = '')
    {
        return unlink($name);
    }

    /**
     * Klas�r� siler
     *
     * @param string $name
     * @return mixed
     */
    public function deleteDir($name = '')
    {
        return rmdir($name);
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
     * $filepath ile girilen yola $mode de�i�kenindeki izinleri atar
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
            throw new Exception(sprintf('%s fonksiyonunda girdi�iniz isim string olmal�d�r', __FUNCTION__));
        }

        if (true === $this->exists($filePath)) {

            return chmod($filePath, $mode);
        }
    }

    /**
     * S�n�f� ba�lat�r ve gerekli i�lemleri �a��r�r
     *
     * @return mixed
     */
    public function boot()
    {
        //
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
