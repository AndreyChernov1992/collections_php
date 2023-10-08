<?php
namespace App\App;

use App\App\CacheInterface;
use App\App\UniqueCount;

class Cache implements CacheInterface 
{

    private $count;
    private $file;
    private $f;
    public $content;
    private $unserr;

    public function set(string $str) :void 
    {
        $result = strval($this->count->countUnique($str));
        $this->unserr[$str] = $result;
        $serr = serialize($this->unserr);
        fputs($this->f, $serr);
        fclose($this->f);
        echo $result;
    }

    public function get(string $str) :void 
    {
        echo $this->unserr[$str];
    }

    public function has(string $str) :bool 
    {
        return array_key_exists($str, $this->unserr);
    }

    private function __construct () 
    {
        $this->count = new UniqueCount();
        $this->file=$_SERVER ["DOCUMENT_ROOT"] . "/cache.txt";
        $this->f=fopen($this->file, "a");
        $this->content = file_get_contents($this->file);
        $this->unserr = unserialize($this->content);
    }
}