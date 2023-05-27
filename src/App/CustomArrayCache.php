<?php
namespace App\App;

class CustomArrayCache {
    private static array $memory = [];
 
    public function store(string $key, $value): bool {
        self::$memory[$key] = $value;
 
        return true;
    }
 
    public function fetch(string $key) {
        return self::$memory[$key] ?? null;
    }
 
    public function exists(string $key): bool {
        return array_key_exists($key, self::$memory);
    }
}

