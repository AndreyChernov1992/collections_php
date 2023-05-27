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

use App\App\UniqueCount;
use App\App\CustomArrayCache;

$str = "";
$cache = new CustomArrayCache($str);
$count = new UniqueCount($str);

if($cache->exists($str)) {
    $cached_str = $cache->fetch($str);
    echo $count->countUnique($cached_str);
}

elseif(isset($_POST["string"])){
    $cache->store($str, $str);
    $str = $_POST["string"];
    echo $count->countUnique($str);
}

?>
<h3>Input form</h3>
<form method="POST">
    <p>String: <input type="text" name="string" /></p>
    <input type="submit" value="Send">
</form>
</body>
</html>