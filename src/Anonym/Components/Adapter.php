<?php
/**
 * This file belongs to the AnoynmFramework
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 * Thanks for using
 */

namespace Anonym\Components\Filesystem;
use League\Flysystem\Adapter\Local;
use League\Flysystem\FilesystemInterface;

class Adapter
{

    /**
     * the instance of filesystem adapter
     *
     * @var FilesystemInterface
     */
    private $adapter;

    /**
     * create a new instance and set the adapter
     *
     * @param FilesystemInterface $adapter
     */
    public function __construct(FilesystemInterface $adapter)
    {
        $this->adapter = $adapter;

    }

    /**
     * set the chmod to the file
     *
     * @param string $path
     * @param int $mod
     * @return bool
     */
    public function chmod($path, $mod = 0777)
    {
        if ($this->adapter instanceof Local) {
            return chmod($path, $mod);
        }

        return false;
    }

    /**
     * check the file is readable
     *
     * @param string $path
     * @return bool
     */
    public function isReadable($path)
    {
        return is_readable($path);
    }

    /**
     * check the file is writeable
     *
     * @param string $path
     * @return bool
     */
    public function isWriteable($path)
    {
        return is_writeable($path);
    }
}
