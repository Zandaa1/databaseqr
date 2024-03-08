<?php
$url = $_GET['url'];
if ($url != '')
{
    $filename = end(explode('/', $url));
    $fileext = strtolower(end(explode('.', $filename)));
    
    if ($fileext == 'jpg' || $fileext == 'jpeg') { $type = 'image/jpeg'; }
    if ($fileext == 'png') { $type = 'image/png'; }
    if ($fileext == 'gif') { $type = 'image/gif'; }
    
    //$size = filesize($url);
    header("Content-Type: $type");
    header("Content-disposition: attachment; filename=\"" . $filename . "\"");
    header("Content-Transfer-Encoding: binary");
    //header("Content-Length: " . $size);
    readfile($url);
}else{
    echo 'url is blank';
}
?>