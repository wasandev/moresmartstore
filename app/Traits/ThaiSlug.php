<?php

namespace App\Traits;


trait ThaiSlug
{
public function convertToSlug($string)
    {
        return preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-',str_replace('&', '-and-', $string));
    }

}
