<?php

$url = (isset($_GET['url']) ? $_GET['url'] : 'site');
$url = array_filter(explode('/', $url));

if ($url[0] === 'painel') {

    $file_url = $url[0] . '.php';
    $file_path = 'src/view/admin/' . $file_url;

} else {
    $file_url = $url[0] . '.php';
    $file_path = 'src/view/' . $file_url;
}


if (is_file($file_path)) {
    require_once($file_path);
} else {
    require_once('src/view/404.php');
}
