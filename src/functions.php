<?php

use Hyperf\Utils\ApplicationContext;

if (!function_exists('di')) {
    function di(string $id)
    {
        return ApplicationContext::getContainer()->get($id);
    }
}