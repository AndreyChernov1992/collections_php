<?php
namespace App\App;

class UniqueCount 
{
    public function countUnique(string $string) :int 
    {
        $array = str_split($string);
        $result = array_diff($array, array_diff_assoc($array, array_unique($array)));
        return count($result);
    }
}