<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */

include 'vendor/autoload.php';

$filesystem = new \Anonym\Components\Filesystem\Filesystem();
$filesystem->setConfig([
    'local' => [
        'root' => '.'
    ]
]);

$local = $filesystem->disk('local');


