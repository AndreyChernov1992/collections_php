<!DOCTYPE html>
<html>
<head>
<title>Unique Characters Count</title>
<meta charset="utf-8" />
</head>
<body>
Number of unique characters: 

<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\App\Cache;

$cache = new Cache;

if(!empty($cache->content) && isset($_POST["string"]))
{
    $str = $_POST["string"];
    
    if($cache->has($str)){
        $cache->get($str);
    }

    else {
        $cache->set($str);
    }   
}

if(empty($cache->content) && isset($_POST["string"])) 
{
    $cache->set($str);
}

?>

<h3>Input form</h3>
<form method="POST">
    <p>String: <input type="text" name="string" /></p>
    <input type="submit" value="Send">
</form>
</body>
</html>