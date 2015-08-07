<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */
namespace Anonym\Components\Filesystem;

/**
 * Interface AwsDriverInterface
 * @package Anonym\Components\Filesystem
 */
interface AwsDriverInterface
{

    /**
     * Kurulumu gerçekleştirir
     *
     * @param array $configs
     * @return $this
     */
    public function setup(array $configs = []);
}
