<?php
/**
 * Bu Dosya AnonymFramework'e ait bir dosyadır.
 *
 * @author vahitserifsaglam <vahit.serif119@gmail.com>
 * @see http://gemframework.com
 *
 */

namespace Anonym\Components\Filesystem;
use League\Flysystem\FileExistsException;
use League\Flysystem\FileNotFoundException;
use League\Flysystem\FilesystemInterface;
use League\Flysystem\Handler;
use League\Flysystem\PluginInterface;
use League\Flysystem\RootViolationException;
use League\Flysystem\InvalidArgumentException;

/**
 * Class FilesystemAdapter
 * @package Anonym\Components\Filesystem
 */
class FilesystemAdapter implements  FilesystemInterface
{

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
     * Check whether a file exists.
     *
     * @param string $path
     *
     * @return bool
     */
    public function has($path)
    {
        // TODO: Implement has() method.
    }

    /**
     * Read a file.
     *
     * @param string $path The path to the file.
     *
     * @throws FileNotFoundException
     *
     * @return string|false The file contents or false on failure.
     */
    public function read($path)
    {
        try{
            return $this->getAdapter()->read($path);
        }catch (FileNotFoundException $e)
        {

        }
    }

    /**
     * Retrieves a read-stream for a path.
     *
     * @param string $path The path to the file.
     *
     * @throws FileNotFoundException
     *
     * @return resource|false The path resource or false on failure.
     */
    public function readStream($path)
    {
        // TODO: Implement readStream() method.
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
        // TODO: Implement listContents() method.
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
        // TODO: Implement getMetadata() method.
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
        // TODO: Implement getSize() method.
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
        // TODO: Implement getMimetype() method.
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
        // TODO: Implement getTimestamp() method.
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
        // TODO: Implement getVisibility() method.
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
        // TODO: Implement write() method.
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
        // TODO: Implement writeStream() method.
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
        // TODO: Implement update() method.
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
        // TODO: Implement updateStream() method.
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
        // TODO: Implement rename() method.
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
        // TODO: Implement copy() method.
    }

    /**
     * Delete a file.
     *
     * @param string $path
     *
     * @throws FileNotFoundException
     *
     * @return bool True on success, false on failure.
     */
    public function delete($path)
    {
        // TODO: Implement delete() method.
    }

    /**
     * Delete a directory.
     *
     * @param string $dirname
     *
     * @throws RootViolationException Thrown if $dirname is empty.
     *
     * @return bool True on success, false on failure.
     */
    public function deleteDir($dirname)
    {
        // TODO: Implement deleteDir() method.
    }

    /**
     * Create a directory.
     *
     * @param string $dirname The name of the new directory.
     * @param array $config An optional configuration array.
     *
     * @return bool True on success, false on failure.
     */
    public function createDir($dirname, array $config = [])
    {
        // TODO: Implement createDir() method.
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
        // TODO: Implement setVisibility() method.
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
        // TODO: Implement put() method.
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
        // TODO: Implement putStream() method.
    }

    /**
     * Read and delete a file.
     *
     * @param string $path The path to the file.
     *
     * @throws FileNotFoundException
     *
     * @return string|false The file contents, or false on failure.
     */
    public function readAndDelete($path)
    {
        // TODO: Implement readAndDelete() method.
    }

    /**
     * Get a file/directory handler.
     *
     * @param string $path The path to the file.
     * @param Handler $handler An optional existing handler to populate.
     *
     * @return Handler Either a file or directory handler.
     */
    public function get($path, Handler $handler = null)
    {
        // TODO: Implement get() method.
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
        // TODO: Implement addPlugin() method.
    }
}
