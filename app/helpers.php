<?php


function saveImage($path, $request)
{
    $image = $request->file('image');
    $name = $image->hashName();
    $image->move(public_path($path), $name);
    return "public{$path}{$name}";
}
