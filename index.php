<?php

$url = (isset($_GET['url']) ? $_GET['url'] : 'home');
$url = array_filter(explode('/', $url));

if ($url[0] === 'admin') {

    $file_url = $url[1] . '.php';
    $file_path = 'admin/' . $file_url;

} else {

    $file_url = $url[0] . '.php';
    $file_path = 'view/' . $file_url;
}

if (is_file($file_path)) {
    require_once($file_path);
} else {
    require_once('view/404.php');
}
