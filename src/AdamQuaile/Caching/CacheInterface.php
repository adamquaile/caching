<?php

namespace AdamQuaile\Caching;

/**
 * Very basic interface that all Caches must adhere to.
 */
interface CacheInterface
{

    /**
     * Determine if a value is stored against given key
     *
     * @param string $key
     *
     * @return bool
     */
    public function isStored($key);

    /**
     * Get a stored value by key.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key);

    /**
     * Store a value associated to a given key
     *
     * @param string $key
     * @param mixed  $value
     *
     */
    public function store($key, $value);
}