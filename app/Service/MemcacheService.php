<?php

class MemcacheService
{
    private $memcache;

    public function __construct()
    {
        try {
            $this->memcache = new \Memcache();
            $this->memcache->connect('localhost', 11211);   
        } catch (\ErrorException $e) {
            $this->memcache = false;
        }
    }

    public function set($key, $data, $time)
    {
        if ($this->memcache) {
            $this->memcache->set($key, $data, false, $time);   
        }
    }

    public function get($key)
    {
        if ($this->memcache) {

            return $this->memcache->get($key);
        }

        return false;
    }
}