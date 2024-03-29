<?php

declare(strict_types=1);

namespace Utils;

/**
 * Class AutoLoader
 *
 * @package Utils
 */
class AutoLoader
{
    protected $prefixes = array();

    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Adds namespaces to array.
     *
     * @param string $prefix
     * @param string $base_dir
     * @param bool $prepend
     */
    public function addNamespace(
        string $prefix,
        string $base_dir,
        bool $prepend = false)
    {
        // normalize namespace prefix
        $prefix = trim($prefix, '\\') . '\\';

        // normalize the base directory with a trailing separator
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';

        // initialize the namespace prefix array
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }

        // retain the base directory for the namespace prefix
        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $base_dir);
        } else {
            array_push($this->prefixes[$prefix], $base_dir);
        }
    }

    /**
     *
     *
     * @param $class
     * @return bool|string
     */
    public function loadClass(string $class)
    {
        // the current namespace prefix
        $prefix = $class;

        while (false !== $pos = strrpos($prefix, '\\')) {

            // retain the trailing namespace separator in the prefix
            $prefix = substr($class, 0, $pos + 1);

            // the rest is the relative class name
            $relative_class = substr($class, $pos + 1);

            // try to load a mapped file for the prefix and relative class
            $mapped_file = $this->loadMappedFile($prefix, $relative_class);
            if ($mapped_file) {
                return $mapped_file;
            }

            $prefix = rtrim($prefix, '\\');
        }

        return false;
    }

    /**
     * @param $prefix
     * @param $relative_class
     * @return bool|string
     */
    protected function loadMappedFile(
        string $prefix,
        string $relative_class)
    {
        // are there any base directories for this namespace prefix?
        if (isset($this->prefixes[$prefix]) === false) {
            return false;
        }

        foreach ($this->prefixes[$prefix] as $base_dir) {

            $file = $base_dir
                . str_replace('\\', '/', $relative_class)
                . '.php';

            // if the mapped file exists, require it
            if ($this->requireFile($file)) {
                // yes, we're done
                return $file;
            }
        }

        // never found it
        return false;
    }

    /**
     * @param string $file
     * @return bool
     */
    protected function requireFile(string $file)
    {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }
}