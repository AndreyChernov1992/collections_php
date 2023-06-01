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

$count = new UniqueCount();
$file=$_SERVER ["DOCUMENT_ROOT"] . "/cache.txt";
$f=fopen($file, "a");
$content = file_get_contents($file);
$unserr = unserialize($content);

if(!empty($content) && isset($_POST["string"])){
    $str = $_POST["string"];
    
    if(array_key_exists($str, $unserr)){
        echo $unserr[$str];
    }

    else {
        $result = strval($count->countUnique($str));
        $unserr[$str] = $result;
        $serr = serialize($unserr);
        fputs($f, $serr);
        fclose($f);
        echo $result;
    }   
    var_dump ($unserr);
}

if(empty($content) && isset($_POST["string"])) {
    $str = $_POST["string"];
    $result = strval($count->countUnique($str));
    $unserr[$str] = $result;
    $serr = serialize($unserr);
    fputs($f, $serr);
    fclose($f);
    echo $result;
}

?>

<h3>Input form</h3>
<form method="POST">
    <p>String: <input type="text" name="string" /></p>
    <input type="submit" value="Send">
</form>
</body>
</html>