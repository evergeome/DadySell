<?php

namespace App\Traits;


trait PhotoTrait
{
    function upload($photo, $dir)
    {
        $file_ext = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_ext;
        $path = $dir;
        $photo->move($path, $file_name);
        return $file_name;
    }
}
