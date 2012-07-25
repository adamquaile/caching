<?php

namespace AdamQuaile\Caching\Storage;

use \AdamQuaile\Caching\CacheInterface;

/**
 * Caching system using PHP's APC functions.
 */
class Apc implements CacheInterface
{
    /**
     * Initialise cache, check if APC is enabled.
     *
     * No parameters required.
     */
    public function __construct()
    {
        if (!function_exists('apc_store')) {
            throw new \RuntimeException("Module APC not available");
        }
    }

    /**
     * Determine if a value is stored against given key
     *
     * @param string $key
     *
     * @return bool
     */
    public function isStored($key)
    {
        return apc_exists($key);
    }

    /**
     * Get a stored value by key.
     *
     * @param string $key
     *
     * @throws \RuntimeException If the key is not cached
     * @return mixed
     */
    public function get($key)
    {
        if (!$this->isStored($key)) {
            throw new \RuntimeException("Key not cached, check first with isStored() or catch this exception.");
        }
    }

    /**
     * Store a value associated to a given key
     *
     * @param string $key
     * @param mixed  $value
     *
     */
    public function store($key, $value)
    {
        return apc_store($key, $value);
    }

}

