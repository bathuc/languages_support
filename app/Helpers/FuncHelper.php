<?php

function renderFiles($filename)
{
    if (file_exists(public_path() . $filename)) {
        return $filename . '?v=' . filemtime(public_path() . $filename);
    } else {
        return $filename;
    }
}

function renderJs($filenames)
{
    $str = '';
    $array = [];
    if (is_array($filenames)) {
        $array = $filenames;
    } else {
        $array[0] = $filenames;
    }

    $c_array = count($array);
    if ($c_array) {
        for ($i=0;$i<$c_array;$i++) {
            $filename = $array[$i];
            $version = '';
            if (file_exists(public_path() . $filename)) {
                $version = $filename . '?v=' . filemtime(public_path() . $filename);
            } else {
                $version = $filename;
            }
            $str .= '<script src="'.$version.'" type="text/javascript"></script>';
            if ($i < $c_array-1) {
                $str .= PHP_EOL;
            }
        }
    }

    return $str;
}

function renderCss($filenames)
{
    $str = '';
    $array = [];
    if (is_array($filenames)) {
        $array = $filenames;
    } else {
        $array[0] = $filenames;
    }

    $c_array = count($array);
    if ($c_array) {
        for ($i=0;$i<$c_array;$i++) {
            $filename = $array[$i];
            $version = '';
            if (file_exists(public_path() . $filename)) {
                $version = $filename . '?v=' . filemtime(public_path() . $filename);
            } else {
                $version = $filename;
            }
            $str .= '<link href="'.$version.'" rel="stylesheet" type="text/css">';
            if ($i < $c_array-1) {
                $str .= PHP_EOL;
            }
        }
    }

    return $str;
}
