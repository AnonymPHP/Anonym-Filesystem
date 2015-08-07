<?php
/**
 * Created by PhpStorm.
 * User: va
 * Date: 07.08.2015
 * Time: 19:35
 */

namespace Anonym\Components\Filesystem\Exceptions;
use Exception;

/**
 * Class FilesystemFileNotFoundException
 * @package Anonym\Components\Filesystem\Exceptions
 */
class FilesystemFileNotFoundException extends Exception
{

    /**
     * İstisnayı oluşturur
     *
     * @param string $message
     */
    public function __construct($message = '')
    {
        $this->message = $message;
    }
}
