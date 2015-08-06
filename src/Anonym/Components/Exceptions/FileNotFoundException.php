<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyad�r.
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
     * �stisnay� olu�turur
     *
     * @param string $message
     */
    public function __construct($message = ''){
        $this->message = $message;
    }
}
