<?php

function upper($str)
{
    return strtoupper($str);
}

function currentUser()
{
    return auth()->user();
}

// Devuelve solo el nombre del archivo pdf guardado
function getReaFileName($str, $collection)
{
    $filename = explode("files/{$collection}/", $str);
    return $filename[1];
}
