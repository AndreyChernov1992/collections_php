<?php

namespace App\App;

interface CacheInterface {

    public function get(string $key): void;

    public function set(string $key): void;

    public function has(string $key): bool;

}