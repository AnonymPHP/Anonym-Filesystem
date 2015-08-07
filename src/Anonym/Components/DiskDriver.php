<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
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
     * Dosyanı kontrol eder
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
                sprintf('Girdiğiniz %s dosyası bulunamadı ', $name)
            );
        }
    }

    /**
     * Dosyanın sonuna veri ekler
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
     * Dosyanın başına veri ekler
     *
     * @param string $name
     * @param string $text
     * @return mixed
     */
    public function prepend($name = '', $text = '')
    {
        $content = $text . $this->read($name);
        $this->write($name, $content);
        return $this;

    }

    /**
     * Dosyanın okunabilir olup olmadığına bakar
     *
     * @param string $fileName
     * @return bool
     */
    public function isReadable($fileName = '')
    {
        return is_readable($fileName);
    }


    /**
     * Dosyanın yazılabilir olup olmadığına bakar
     *
     * @param string $fileName
     * @return bool
     */
    public function isWriteable($fileName = '')
    {
        return is_writeable($fileName);
    }

    /**
     * Dosyanın içeriğini atar
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
     * Dosyayı siler
     *
     * @param string $name
     * @return mixed
     */
    public function delete($name = '')
    {
        return unlink($name);
    }

    /**
     * Klasürü siler
     *
     * @param string $name
     * @return mixed
     */
    public function deleteDir($name = '')
    {
        return rmdir($name);
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
        return $this->rename($src, $dest);
    }

    /**
     * $filepath ile girilen yola $mode değişkenindeki izinleri atar
     *
     * @param string $filePath
     * @param int $mode
     * @throws Exception
     * @return bool
     */
    public function chmod($filePath = '', $mode = 0777)
    {
        if (!is_string($filePath)) {
            throw new Exception(sprintf('%s fonksiyonunda girdi�iniz isim string olmal�d�r', __FUNCTION__));
        }

        if (true === $this->exists($filePath)) {

            return chmod($filePath, $mode);
        }
    }

    /**
     * @param string $src
     * @param  string $dest
     * @return bool
     * @throws Exception
     */
    public function rename($src, $dest)
    {
        if (!is_string($src) || !is_string($dest)) {
            throw new Exception(sprintf('%s fonksiyonunda girdi�iniz isim string olmal�d�r', __FUNCTION__));
        }

        if (false === $this->exists($src)) {
            return;
        }

        if (false === rename($src, $dest)) {

            $error = error_get_last();
            throw new Exception(
                sprintf('isim değiştirme işlemi sırasında bir hata oluştu: %s', $error['message'])
            );
        }


        return true;
    }

    /**
     * Dosya Kopyalama işlemini yapar
     *
     * @param string $src
     * @param string $desc
     * @throws Exception
     */
    public function copy($src = '', $desc = '')
    {

        if (!is_file($src)) {

            throw new Exception(
                sprintf('girdiğiniz %s bir dosya değil', $src));
        }

        $this->mkdir($desc);

        if (true !== copy($src, $desc)) {

            $error = error_get_last();
            throw new Exception(
                sprintf('Dosya kopyalama sırasında bir hata oluıtu: %s', $error['message'])
            );
        }
    }

    /**
     * Sınıfı başlatır ve gerekli işlemleri yapar
     *
     * @return mixed
     */
    public function boot()
    {
        //
    }

    /**
     * Sürücünün kullanılır olup olmadığına bakar
     *
     * @return bool
     */
    public function check()
    {
        return true;
    }
}
