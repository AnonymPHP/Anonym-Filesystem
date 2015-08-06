<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */

namespace Anonym\Components\Filesystem\Exceptions;
use Exception;

/**
 * Class DriverNotFoundException
 * @package Anonym\Components\Filesystem\Exceptions
 */
class FileNotFoundException extends Exception
{

    /**
     * İstisnayı oluşturur
     *
     * @param string $message
     */
    public function __construct($message = ''){
        $this->message = $message;
    }
}
