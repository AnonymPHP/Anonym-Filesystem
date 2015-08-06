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
 * Interface FilesystemInterface
 * @package Anonym\Components\Filesystem
 */
interface FilesystemInterface
{
    /**
     * Kullan�lacak olan driver Girilir
     *
     * @param string $driver
     * @return mixed
     */
    public function driver($driver = '');

}
