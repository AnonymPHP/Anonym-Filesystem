<?php
/**
 * Created by PhpStorm.
 * User: va
 * Date: 07.08.2015
 * Time: 00:05
 */

namespace Anonym\Components\Filesystem\Exceptions;
use Exception;

/**
 * Class DriverNotReadyException
 * @package Anonym\Components\Filesystem\Exceptions
 */
class DriverNotReadyException extends Exception
{
    /**
     * �stisnay� olu�turur
     *
     * @param string $message
     */
    public function __construct($message = '')
    {
        $this->message = $message;
    }
}
