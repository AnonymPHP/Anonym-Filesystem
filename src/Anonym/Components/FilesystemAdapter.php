<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */

namespace Anonym\Components\Filesystem;

use Anonym\Components\Filesystem\Exceptions\FilesystemFileNotFoundException;
use League\Flysystem\AdapterInterface;
use League\Flysystem\FileExistsException;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\FilesystemInterface;
use League\Flysystem\Handler;
use League\Flysystem\PluginInterface;
use League\Flysystem\RootViolationException;
use League\Flysystem\InvalidArgumentException;
use Symfony\Component\Finder\Finder;

/**
 * Class FilesystemAdapter
 * @package Anonym\Components\Filesystem
 */
class FilesystemAdapter implements FilesystemInterface
{

    /**
     * Herkeze açık görünürlüğü ifade eder
     *
     *
     * @var string
     */
    const VISIBILITY_PUBLIC = 'public';

    /**
     * Gizli görünürlüğü ifade eder
     *
     * @var string
     */
    const VISIBILITY_PRIVATE = 'private';
    /**
     * Adapter i tutar
     *
     * @var FilesystemInterface
     */
    private $adapter;

    /**
     * Sınıfı başlatır ve adapter atamasını yapar
     *
     * @param null|FilesystemInterface $adapter
     */
    public function __construct($adapter = null)
    {
        $this->setAdapter($adapter);
    }

    /**
     * @return FilesystemInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @param FilesystemInterface $adapter
     * @return FilesystemAdapter
     */
    public function setAdapter(FilesystemInterface $adapter)
    {
        $this->adapter = $adapter;
        return $this;
    }


    /**
     * Dosyanın olup olmadığını kontrol eder
     *
     * @param string $path
     * @return bool
     */
    public function exists($path)
    {
        return $this->has($path);
    }

    /**
     * Check whether a file exists.
     *
     * @param string $path
     *
     * @return bool
     */
    public function has($path)
    {
        return $this->getAdapter()->has($path);
    }

    /**
     * Read a file.
     *
     * @param string $path The path to the file.
     *
     * @throws FilesystemFileNotFoundException
     *
     * @return string|false The file contents or false on failure.
     */
    public function read($path)
    {
        try {
            return $this->getAdapter()->read($path);
        } catch (FileNotFoundException $e) {
            throw new FilesystemFileNotFoundException(sprintf('%s isimli dosyanız bulunamadı', $path));
        }
    }

    /**
     * Retrieves a read-stream for a path.
     *
     * @param string $path The path to the file.
     *
     * @throws FilesystemFileNotFoundException
     *
     * @return resource|false The path resource or false on failure.
     */
    public function readStream($path)
    {
        try {
            return $this->getAdapter()->readStream($path);
        } catch (FileNotFoundException $e) {
            throw new FilesystemFileNotFoundException(sprintf('%s isimli dosyanız bulunamadı', $path));
        }
    }

    /**
     * List contents of a directory.
     *
     * @param string $directory The directory to list.
     * @param bool $recursive Whether to list recursively.
     *
     * @return array A list of file metadata.
     */
    public function listContents($directory = '', $recursive = false)
    {

    }

    /**
     * Get a file's metadata.
     *
     * @param string $path The path to the file.
     *
     * @throws FileNotFoundException
     *
     * @return array|false The file metadata or false on failure.
     */
    public function getMetadata($path)
    {
        return $this->getAdapter()->getMetadata($path);
    }

    /**
     * Get a file's size.
     *
     * @param string $path The path to the file.
     *
     * @return int|false The file size or false on failure.
     */
    public function getSize($path)
    {
        return $this->getAdapter()->getSize($path);
    }

    /**
     * Get a file's mime-type.
     *
     * @param string $path The path to the file.
     *
     * @throws FileNotFoundException
     *
     * @return string|false The file mime-type or false on failure.
     */
    public function getMimetype($path)
    {
        return $this->getAdapter()->getMimetype($path);
    }

    /**
     * Get a file's timestamp.
     *
     * @param string $path The path to the file.
     *
     * @throws FileNotFoundException
     *
     * @return string|false The timestamp or false on failure.
     */
    public function getTimestamp($path)
    {
        return $this->getAdapter()->getTimestamp($path);
    }

    /**
     * Get a file's visibility.
     *
     * @param string $path The path to the file.
     *
     * @throws FileNotFoundException
     *
     * @return string|false The visibility (public|private) or false on failure.
     */
    public function getVisibility($path)
    {
        $visibility = $this->getAdapter()->getVisibility($path);

        if ($visibility === AdapterInterface::VISIBILITY_PUBLIC) {
            return self::VISIBILITY_PUBLIC;
        }

        return self::VISIBILITY_PRIVATE;
    }

    /**
     * Write a new file.
     *
     * @param string $path The path of the new file.
     * @param string $contents The file contents.
     * @param array $config An optional configuration array.
     *
     * @throws FileExistsException
     *
     * @return bool True on success, false on failure.
     */
    public function write($path, $contents, array $config = [])
    {
        return $this->getAdapter()->write($path, $config, $config);
    }

    /**
     * Write a new file using a stream.
     *
     * @param string $path The path of the new file.
     * @param resource $resource The file handle.
     * @param array $config An optional configuration array.
     *
     * @throws InvalidArgumentException If $resource is not a file handle.
     * @throws FileExistsException
     *
     * @return bool True on success, false on failure.
     */
    public function writeStream($path, $resource, array $config = [])
    {
        return $this->writeStream($path, $resource, $config);
    }

    /**
     * Update an existing file.
     *
     * @param string $path The path of the existing file.
     * @param string $contents The file contents.
     * @param array $config An optional configuration array.
     *
     * @throws FileNotFoundException
     *
     * @return bool True on success, false on failure.
     */
    public function update($path, $contents, array $config = [])
    {
        return $this->getAdapter()->update($path, $config, $config);
    }

    /**
     * Update an existing file using a stream.
     *
     * @param string $path The path of the existing file.
     * @param resource $resource The file handle.
     * @param array $config An optional configuration array.
     *
     * @throws InvalidArgumentException If $resource is not a file handle.
     * @throws FileNotFoundException
     *
     * @return bool True on success, false on failure.
     */
    public function updateStream($path, $resource, array $config = [])
    {
        return $this->getAdapter()->updateStream($path, $resource, $config);
    }

    /**
     * Rename a file.
     *
     * @param string $path Path to the existing file.
     * @param string $newpath The new path of the file.
     *
     * @throws FileExistsException   Thrown if $newpath exists.
     * @throws FileNotFoundException Thrown if $path does not exist.
     *
     * @return bool True on success, false on failure.
     */
    public function rename($path, $newpath)
    {
        return $this->getAdapter()->rename($path, $newpath);
    }

    /**
     * Copy a file.
     *
     * @param string $path Path to the existing file.
     * @param string $newpath The new path of the file.
     *
     * @throws FileExistsException   Thrown if $newpath exists.
     * @throws FileNotFoundException Thrown if $path does not exist.
     *
     * @return bool True on success, false on failure.
     */
    public function copy($path, $newpath)
    {
        return $this->getAdapter()->copy($path, $newpath);
    }

    /**
     * Delete a file.
     *
     * @param string|array $path
     *
     * @throws FileNotFoundException
     *
     * @return bool True on success, false on failure.
     */
    public function delete($path)
    {
        $paths = is_array($path) ? $path : func_get_args();
        foreach ($paths as $pa) {
            $this->getAdapter()->delete($pa);
        }

        return true;
    }

    /**
     * Delete a directory.
     *
     * @param string|array $dirname
     *
     * @throws RootViolationException Thrown if $dirname is empty.
     *
     * @return bool True on success, false on failure.
     */
    public function deleteDir($dirname)
    {
        $dirs = is_array($dirname) ? $dirname : func_get_args();
        foreach ($dirs as $dir) {
            $this->getAdapter()->deleteDir($dir);
        }

        return true;
    }

    /**
     * Create a directory.
     *
     * @param string|array $dirname The name of the new directory.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     */
    public function createDir($dirname, array $config = [])
    {
        $dirs = is_array($dirname) ? $dirname : func_get_args();

        foreach ($dirs as $dir) {
            $this->getAdapter()->createDir($dir);
        }

        return true;
    }

    /**
     * Dosyanın önüne içerik ekler
     *
     * @param  string $path
     * @param  string $data
     * @return int
     */
    public function prepend($path, $data)
    {
        if ($this->exists($path)) {
            return $this->write($path, $data . PHP_EOL . $this->get($path));
        }

        return $this->write($path, $data);
    }

    /**
     * Dosyanın sonuna veri ekler
     *
     * @param  string $path
     * @param  string $data
     * @return int
     */
    public function append($path, $data)
    {
        if ($this->exists($path)) {
            return $this->write($path, $this->get($path) . PHP_EOL . $data);
        }

        return $this->write($path, $data);
    }

    /**
     * Set the visibility for a file.
     *
     * @param string $path The path to the file.
     * @param string $visibility One of 'public' or 'private'.
     *
     * @return bool True on success, false on failure.
     */
    public function setVisibility($path, $visibility)
    {
        return $this->getAdapter()->setVisibility($path, $this->parseVisibility($visibility));
    }

    /**
     * Görünürlük değerini parçalar
     *
     * @param $visibility
     * @return string|void
     * @throws InvalidArgumentException
     */
    protected function parseVisibility($visibility)
    {
        if (is_null($visibility)) {
            return;
        }

        switch ($visibility) {
            case self::VISIBILITY_PUBLIC:
                return AdapterInterface::VISIBILITY_PUBLIC;

            case self::VISIBILITY_PRIVATE:
                return AdapterInterface::VISIBILITY_PRIVATE;
        }

        throw new InvalidArgumentException('Unknown visibility: ' . $visibility);
    }

    /**
     * Create a file or update if exists.
     *
     * @param string $path The path to the file.
     * @param string $contents The file contents.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     */
    public function put($path, $contents, array $config = [])
    {
        return $this->getAdapter()->put($path, $contents, $config);
    }

    /**
     * Create a file or update if exists.
     *
     * @param string $path The path to the file.
     * @param resource $resource The file handle.
     * @param array $config An optional configuration array.
     *
     * @throws InvalidArgumentException Thrown if $resource is not a resource.
     *
     * @return bool True on success, false on failure.
     */
    public function putStream($path, $resource, array $config = [])
    {
        return $this->getAdapter()->putStream($path, $resource, $config);
    }

    /**
     * Read and delete a file.
     *
     * @param string $path The path to the file.
     *
     * @throws FilesystemFileNotFoundException
     *
     * @return string|false The file contents, or false on failure.
     */
    public function readAndDelete($path)
    {
        $content = $this->read($path);
        $this->delete($path);

        return $content;
    }

    /**
     * Get a file/directory handler
     *
     * @param string $path The path to the file.
     * @param Handler $handler An optional existing handler to populate.
     *
     * @return Handler Either a file or directory handler.
     */
    public function get($path, Handler $handler = null)
    {
        return $this->getAdapter()->get($path, $handler);
    }

    /**
     * Change file/directory chmod configs
     *
     * @param string $path The path of ifle
     * @param int $mode An optional config to chmod
     * @return bool True on success, false on failure
     */
    public function chmod($path, $mode = 0777)
    {
        return chmod($path, $mode);
    }

    /**
     * Check file/dir is readable
     *
     * @param string $path The path to file
     * @return bool True on if file/dir is readable, false on is not readable
     */
    public function isReadable($path)
    {
        return is_readable($path);
    }

    /**
     * Check file/dir is writeable
     *
     * @param string $path The path to file
     * @return bool True on if file/dir is writeable, false on file/dir is not writeable
     */
    public function isWriteable($path)
    {
        return is_writeable($path);
    }

    /**
     * return all files in the dir
     *
     * @param string $path The path to file
     * @return array Filtered contents
     */
    public function files($path = ''){
        return $this->filterContentsByType($path, 'files');
    }

    /**
     * Get all (recursive) of the directories within a given directory.
     *
     * @param  string|null $directory
     * @return array
     */
    public function allDirectories($directory = null)
    {
        return $this->filterContentsByType($directory, 'dir');
    }

    /**
     * filter content by type
     *
     * @param sting $path The path to file
     * @param string $type The type of filter
     * @return array Filtered contents
     */
    private function filterContentsByType($path, $type = 'files')
    {

        if($type === 'dir'){
            $filter = Finder::create()->directories()->in($path);
        }elseif($type === 'files'){
            $filter = Finder::create()->files()->in($path);
        }

        return $filter;
    }
    /**
     * Register a plugin.
     *
     * @param PluginInterface $plugin The plugin to register.
     *
     * @return $this
     */
    public function addPlugin(PluginInterface $plugin)
    {
        $this->getAdapter()->addPlugin($plugin);
    }

    /**
     * Eğer fonksiyon bu sınıfta yoksa adapter den çağırmaya çalışır
     *
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public function __call($method, $args)
    {

        return call_user_func_array([$this->getAdapter(), $method], $args);
    }
}
